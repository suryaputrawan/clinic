<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showloginform()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        }
        return redirect()->route('login')->with('error', 'Masukkan Email dan Password yang benar !');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function username()
    {
        return 'username';
    }
}
