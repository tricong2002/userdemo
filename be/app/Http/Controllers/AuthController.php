<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:8|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'message' => 'User registered successfully!',
                'user' => $user, // Trả về user vừa tạo
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e,
                'details' => $e->getMessage(), // Chỉ debug, có thể bỏ
            ], 422);
        }
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {

            if (Auth::attempt($request->only('email', 'password'))) {

                $user = Auth::user();

                $token = $user->createToken('AuthToken', [$user->role])->plainTextToken;

                return response()->json(['success' => 'Đăng nhập thành công', 'token' => $token], 200);
            } else {
                return response()->json(['error' => 'Sai tài khoản hoặc mật khẩu'], 422);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e,
            ], 422);
        }
    }

    public function getUserInfo(Request $request)
    {
        try {
            $user = $request->user();
            return response()->json($user);
        } catch (\Throwable $th) {
            return response()->json($th);
        }
    }
    public function logout(Request $request)
    {
        try {
     
            $request->user()->tokens()->delete();
            return response()->json(['success' => 'Logout thành công'], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }


    public function forgot(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {

            $token = Str::random(64);
            $resetLink = url("http://localhost:5173/reset?email={$request->email}&token={$token}");
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $request->email],  // Điều kiện kiểm tra
                ['token' => $token, 'created_at' => now()] // Cập nhật nếu email đã tồn tại
            );
            Mail::send('email.forgotpassmail', ['token' => $token, 'emailurl' => $resetLink], function ($message) use ($request) {
                $message->to($request->email); // Người nhận là email trong request
                $message->subject('Your Password Reset Link'); // Tiêu đề email
            });

            return response()->json([
                'message' => 'Email xác thực đã được gửi',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e,
                'details' => $e->getMessage(), // Chỉ debug, có thể bỏ
            ], 422);
        }
    }
    /* QUEN MAT KHAUKHAU */
    public function resetPass(Request $request)
    { {
            $validator = Validator::make($request->all(), [
                'password' => 'required|min:8|confirmed',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }
            $usetcheck =   DB::table('password_reset_tokens')->where('email', $request->email)
                ->where('token', $request->token)
                ->first();
            try {
                if ($usetcheck) {
                    User::where('email', $request->email)->update([
                        'password' => Hash::make($request->password)
                    ]);
                    return response()->json(['sucsses' => 'Mật khẩu đã được cập nhật'], 200);
                }
            } catch (\Exception $e) {
                return response()->json([
                    'error' => $e,
                    'details' => $e->getMessage(), // Chỉ debug, có thể bỏ
                ], 422);
            }
        }
    }
}
