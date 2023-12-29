<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SiswaLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login_siswa');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->intended('/profilsiswa');
        }
    
        return redirect()
            ->route('siswa.login') // Adjust the route name based on your setup
            ->withInput($request->only('email', 'password'))
            ->with('error', 'Maaf, Ada yang salah dari inputan anda!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

