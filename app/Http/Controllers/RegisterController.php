<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function postregister(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'username' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(40),
        ]);

        return redirect()->route('login')->with('sukses', 'Registrasi berhasil, silahkan melakukan login');
    }
}
