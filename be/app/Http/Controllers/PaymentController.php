<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $user = Auth::user();

        $getselect = Address::where('user_id', $user->id)->where('is_default', 'yes')->first();
        $order = new order();
        $order->user_id =  $user->id;
        $order->payment_method = 'bank';
        $order->address_id  = (int)$getselect->id;

        $order->save();
        $cart = Session::get('cart', []);
        /*   dd($getselect); */
        foreach ($cart as $item) {
            $orderdetail = new OrderDetail();
            $orderdetail->order_id = $order->id;
            $orderdetail->product_id = $item['product_id'];
            $orderdetail->price = $item['price'];
            $orderdetail->quantity = $item['quantity'];
            $orderdetail->save();
        }

        // VNPAY credentials
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = 'http://localhost:5173/paymentsuccess';
        $vnp_TmnCode = "TCK3LDFM"; // Merchant code at VNPAY
        $vnp_HashSecret = "2THE6UPNZBTNAN4EAQ9DX2BVBYPBZ827"; // Secret key

        // Transaction information
        $vnp_TxnRef = $order->id; // Transaction reference (unique per order)
        $vnp_OrderInfo = 'Thanh toán đơn hàng test'; // Order information
        $vnp_OrderType = 'other';
        $vnp_Amount = (int) $request->total * 100; // Amount in VND (VNPAY expects amount in cents)
        $vnp_Locale = 'vn'; // Locale

        $vnp_IpAddr = $request->ip(); // Use Laravel's request to get IP

        // Prepare input data
        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",

            "vnp_CreateDate" => Carbon::now('Asia/Ho_Chi_Minh')->format('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        // Optional fields
        if (!empty($vnp_BankCode)) {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        } else {
            // Bỏ qua mã ngân hàng và để VNPAY tự động chọn
            unset($inputData['vnp_BankCode']);
        }


        // Sort parameters by key
        ksort($inputData);

        // Build the query string and hashdata for signature
        $queryString = "";
        $hashdata = "";
        $i = 0;
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $queryString .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        // Remove trailing '&' from the query string
        $queryString = rtrim($queryString, '&');

        // Now calculate the secure hash using the secret key
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);

        // Append the secure hash to the query string
        $vnp_Url .= "?" . $queryString . "&vnp_SecureHash=" . $vnpSecureHash;

        // Return the payment URL or redirect
        return response()->json(['payment_url' => $vnp_Url]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function vnpayReturn(Request $request)
    {
        // Lấy thông tin từ query string
        $inputData = $request->all();
        $vnp_HashSecret = "2THE6UPNZBTNAN4EAQ9DX2BVBYPBZ827";
        $vnp_SecureHash = $inputData['vnp_SecureHash'] ?? '';

        unset($inputData['vnp_SecureHash']);
        unset($inputData['vnp_SecureHashType']);

        // Sắp xếp lại
        ksort($inputData);
        $hashData = '';
        $i = 0;
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        // Xác thực chữ ký
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHash === $vnp_SecureHash) {
            if ($inputData['vnp_ResponseCode'] == '00') {
                $orderId = $inputData['vnp_TxnRef'];
                $order = Order::find($orderId);
                if ($order) {
                    $order->payment_status = 'done';
                    $order->status = 'pending';
                    $order->save();
                }
                session()->forget("cart");
                return response()->json(['message' => 'Thanh toán thành công']);
            } else {
                return response()->json(['message' => 'Thanh toán thất bại']);
            }
        } else {
            return response()->json(['error' => 'Xác minh chữ ký không hợp lệ']);
        }
    }
}
