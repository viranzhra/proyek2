<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
   // Menambahkan middleware untuk memastikan pengguna telah login
    public function __construct()
    {
        $this->middleware('auth:admin')->except('showLoginForm', 'login', 'logout');
    }

    // Menampilkan form login admin
    public function showLoginForm()
    {
        return view('login_admin');
    }

    // Proses login admin
    public function login(Request $request)
    {
        // Mengambil kredensial (email dan password) dari input form
        $credentials = $request->only('username', 'email', 'password');

        // Memeriksa kredensial dan mencoba login menggunakan guard 'admin' yang telah didefinisikan pada config/auth.php
        if (Auth::guard('admin')->attempt($credentials)) {
            // Jika berhasil, arahkan ke halaman tujuan atau dashboard admin
            return redirect()->intended('/home');
        }

        // Jika login gagal, tampilkan notifikasi SweetAlert
        return redirect()
            ->route('admin.login.form') // Menggunakan route untuk meredirect ke form login
            ->withInput($request->only('email'))
            ->with('error', 'Invalid email or password');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            Session::flush();
            Session::regenerate();
            session()->forget('admin');
            session_destroy();
        }
    
        return redirect()->route('admin.login.form');
    }
    
}
