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

Route::get('/prestasi', function () {
    return view('prestasi', [
        "title" => "Prestasi"
    ]);
});

Route::get('/aduan1', function () {
    return view('admin/aduan/kelas7', [
        "title" => "Aduan Kelas 7"
    ]);
});

Route::get('/aduan2', function () {
    return view('admin/aduan/kelas8', [
        "title" => "Aduan Kelas 8"
    ]);
});

Route::get('/aduan3', function () {
    return view('admin/aduan/kelas9', [
        "title" => "Aduan Kelas 9"
    ]);
});