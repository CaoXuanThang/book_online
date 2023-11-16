<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        // check get,post
        if ($request->isMethod('get')) {
            return view('auth.login');
        }
        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->route('client.home');
            }

            return redirect()->back()->with('error', 'Sai tài khoản hoặc mật khẩu');
           
        }
    }
    public function register(AuthRequest $request)
    {
         // check get,post
         if ($request->isMethod('get')) {
            return view('auth.register');
        }
        if ($request->isMethod('post')) {
            $params = $request->except('_token');
            $params['password'] = bcrypt($params['password']);
            User::create($params);
            return redirect()->route('login')->with('success', 'Đăng ký thành công');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
