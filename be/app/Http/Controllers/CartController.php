<?php

namespace App\Http\Controllers;

use App\Helper\cart;
use App\Models\CartModel;
use App\Models\product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addcart(Request $request, cart $cart)
    {
        /*   dd($request->id); */
        $id = (int) $request->id;
        if ($request->quantity) {
            $quantity = (int)$request->quantity;
        }

        $product = product::find($id);

        $ee =  $cart->add($product, $quantity);
        /* dd($request->all()); */
        return $ee;
    }
    public function getCart()
    {
        if (session('cart')) {
            $total = $this->sumtotal();
            return response()->json(['cart' => session('cart'), 'total' => $total], 200);
        } else {
            return response()->json(['cart' => null], 200);
        }
    }

    public function upProCart(Request $request, cart $cart)
    {
        $id = (int) $request->id;
        $product = product::find($id);
        $ee =  $cart->add($product, 1);
        return $ee;
    }
    public function downProCart(Request $request, cart $cart)
    {
        $id = (int) $request->id;
        $product = product::find($id);
        $ee =  $cart->add($product, -1);
        return $ee;
    }
    public function sumtotal()
    {
        $total = 0;
        $items = session('cart');
        foreach ($items as $all) {
            $total += $items[$all['product_id']]['quantity'] * $items[$all['product_id']]['price'];
        }
        return $total;
    }

    public function   deleteCart(Request $request)
    {
        $id = (int) $request->id;
        session()->forget("cart.$id");
    }
    public function checkCart()
    {
        if (!session('cart')) {
            return response()->json(['error' => 'không có sản phẩm được thêm'], 400);
        }
        return response()->json(['success' => 'xác thực thành công'], 200);
    }
}
