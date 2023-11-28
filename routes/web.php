<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminProfileController;

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
})->name('landingpage');

Route::get('/visimisi', function () {
    return view('visi_misi', [
        "title" => "Visi Misi"
    ]);
})->name('visi_misi');

Route::get('/loginsiswa', function () {
    return view('login_siswa', [
        "title" => "Login Siswa"
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

Route::get('/home', function () {
    return view('admin/home', [
        "title" => "Home"
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

Route::get('/pemasukan1', function () {
    return view('admin/pemasukkan/kelas7', [
        "title" => "Pemasukkan Kelas 7"
    ]);
});

Route::get('/pemasukan2', function () {
    return view('admin/pemasukkan/kelas8', [
        "title" => "Pemasukkan Kelas 8"
    ]);
});

Route::get('/pemasukan3', function () {
    return view('admin/pemasukkan/kelas9', [
        "title" => "Pemasukkan Kelas 9"
    ]);
});

Route::get('/eskul', function () {
    return view('eskul', [
        "title" => "Data Kelas 9"
    ]);
});

Route::get('/profilguru', function () {
    return view('profilguru', [
        "title" => "Profil Guru"
    ]);
});

// Rute untuk menampilkan formulir login admin
Route::get('/loginadmin', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');
 // ->name('admin.login.form') memberikan nama pada rute agar dapat diacu dengan mudah


// Rute untuk menangani proses login admin
Route::post('/loginadmin', [AdminLoginController::class, 'login'])->name('admin.login');

// Rute untuk menangani proses logout admin
Route::post('/logoutadmin', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::get('/logoutadmin', function () {
    return view('logout_admin', [
        "title" => "Logout Admin"
    ]);
})->name('logoutadmin');

// Rute untuk halaman /aduan1 yang memerlukan autentikasi
Route::middleware('auth:admin')->group(function () {
    Route::get('/aduan1', function () {
        return view('admin/aduan/kelas7');
    })->name('aduan1');
});

Route::get('/update-profile', [AdminProfileController::class, 'showUpdateForm'])->name('admin.update.profile.form');
Route::post('/update-profile', [AdminProfileController::class, 'updateProfile'])->name('admin.update.profile');