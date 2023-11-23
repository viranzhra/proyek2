<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // Menampilkan form login admin
    public function showLoginForm()
    {
        return view('login_admin');
    }

    // Proses login admin
    public function login(Request $request)
    {
        // Mengambil kredensial (email dan password) dari input form
        $credentials = $request->only('email', 'password');

        // Memeriksa kredensial dan mencoba login menggunakan guard 'admin' yang telah didefinisikan pada config/auth.php
        if (Auth::guard('admin')->attempt($credentials)) {
            // Jika berhasil, arahkan ke halaman tujuan atau dashboard admin
            return redirect()->intended('/aduan1');
        }

        // Jika login gagal, kembali ke form login dengan pesan kesalahan
        return redirect()->back()->withErrors(['email' => 'Invalid email or password']);
    }

    // Logout admin
    public function logout()
    {
        // Logout menggunakan guard 'admin' dan redirect ke halaman login
        Auth::guard('admin')->logout();
        return redirect('/login_admin');
    }
}