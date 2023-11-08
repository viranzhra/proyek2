<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

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

Route::get('/isiprestasi', function () {
    return view('isiprestasi', [
        "title" => "Isi Prestasi"
    ]);
});

Route::get('/eskul', function () {
    return view('eskul', [
        "title" => "Eskul"
    ]);
});

Route::get('/isieskul', function () {
    return view('isieskul', [
        "title" => "Isi Eskul"
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

Route::get('/data1', function () {
    return view('admin/data_siswa/kelas7', [
        "title" => "Data Kelas 7"
    ]);
});

Route::get('/data2', function () {
    return view('admin/data_siswa/kelas8', [
        "title" => "Data Kelas 8"
    ]);
});

Route::get('/data3', function () {
    return view('admin/data_siswa/kelas9', [
        "title" => "Data Kelas 9"
    ]);
});

Route::get('/admin', [SessionController::class, 'index']);
Route::get('/admin/login', [SessionController::class, 'login']);