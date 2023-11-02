<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingpage', [
        "title" => "Beranda"
    ]);
});

Route::get('/visimisi', function () {
    return view('visi_misi', [
        "title" => "Visi Misi"
    ]);
});

Route::get('/loginsiswa', function () {
    return view('login_siswa', [
        "title" => "Login Siswa"
    ]);
});

Route::get('/loginadmin', function () {
    return view('login_admin', [
        "title" => "Login Admin"
    ]);
});
