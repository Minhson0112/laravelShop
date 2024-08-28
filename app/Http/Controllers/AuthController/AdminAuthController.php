<?php

namespace App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('AdminLogin'); // View cho trang đăng nhập
    }

    public function login(Request $request)
    {

        $credentials = $request->only('userId', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Đăng nhập thành công
            return redirect()->intended('/home');
        }

        // Đăng nhập thất bại
        return redirect()->back()->withErrors([
            'error' => 'ユーザーIDまたはパスワードが間違っています。',
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

}
