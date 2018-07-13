<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function dealLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $remember = $request->input('_token');
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->withInput()->withErrors('用户名或密码错误');
        }
    }
}
