<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        return view("login_admin");
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Username wajid diisi',
            'email.required' => 'Email wajid diisi',
            'password.required' => 'Password wajid diisi',
        ]);

        $infologin = [
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if(Auth::attempt($infologin)) {
            return 'sukses';
        } else {
            return 'gagal';
        }
    }

}
