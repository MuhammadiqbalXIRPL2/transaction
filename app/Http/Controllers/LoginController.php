<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class Login extends Controller
{
    function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'You are not input your Username',
            'password.required' => 'Please input your Password',
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/index');
        } else {
            return redirect('/')->withErrors('nama atau Password anda salah')->withInput();
        }
    }
}
