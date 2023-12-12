<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; // Tambahkan use untuk menggunakan Session

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except('showLoginForm', 'login', 'logout');
    }

    public function showLoginForm()
    {
        return view('login_admin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password'); // Hanya butuh email dan password

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/home');
        }

        return redirect()
            ->route('admin.login.form')
            ->withInput($request->only('email'))
            ->with('error', 'Invalid email or password');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
        }

        return redirect()->route('admin.login.form');
    }
}
