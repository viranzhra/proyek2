<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminController;

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

// Grup route yang memerlukan otentikasi admin
Route::middleware('auth:admin')->group(function () {

    Route::get('/home', function () {
        return view('admin.home', [
            "title" => "Home",
            "active" => "home" // Menetapkan status aktif untuk halaman home
        ]);
    })->name('home');

    Route::get('/aduan1', function () {
        return view('admin/aduan/kelas7', [
            "title" => "Aduan Kelas 7"
        ]);
    })->name('aduan1');

    Route::get('/aduan2', function () {
        return view('admin/aduan/kelas8', [
            "title" => "Aduan Kelas 8"
        ]);
    })->name('aduan2');

    Route::get('/aduan3', function () {
        return view('admin/aduan/kelas9', [
            "title" => "Aduan Kelas 9"
        ]);
    })->name('aduan3');

    Route::get('/data1', function () {
        return view('admin/data_siswa/kelas7', [
            "title" => "Data Kelas 7"
        ]);
    })->name('data1');
    

    Route::get('/data2', function () {
        return view('admin/data_siswa/kelas8', [
            "title" => "Data Kelas 8"
        ]);
    })->name('data2');

    Route::get('/data3', function () {
        return view('admin/data_siswa/kelas9', [
            "title" => "Data Kelas 9"
        ]);
    })->name('data3');

    Route::get('/pemasukan1', function () {
        return view('admin/pemasukkan/kelas7', [
            "title" => "Pemasukkan Kelas 7"
        ]);
    })->name('pemasukan1');

    Route::get('/pemasukan2', function () {
        return view('admin/pemasukkan/kelas8', [
            "title" => "Pemasukkan Kelas 8"
        ]);
    })->name('pemasukan2');

    Route::get('/pemasukan3', function () {
        return view('admin/pemasukkan/kelas9', [
            "title" => "Pemasukkan Kelas 9"
        ]);
    })->name('pemasukan3');

    Route::get('/data_admin', [AdminController::class, 'index'])->name('admin.data_admin.data_admin');;

    Route::get('/profilguru', function () {
        return view('profilguru', [
            "title" => "Profil Guru"
        ]);
    })->name('profilguru');
});

// Rute untuk menampilkan formulir login admin
Route::get('/loginadmin', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');

// Rute untuk menangani proses login admin
Route::post('/loginadmin', [AdminLoginController::class, 'login'])->name('admin.login');

Route::post('/logoutadmin', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::get('/update-profile', [AdminProfileController::class, 'showUpdateForm'])->name('admin.update.profile.form');
Route::post('/update-profile', [AdminProfileController::class, 'updateProfile'])->name('admin.update.profile');

Route::get('/profilsiswa', function () {
    return view('siswa/profil/profil', [
        "title" => "Profil Siswa"
    ]);
})->name('profilsiswa');

Route::get('/aduansiswa', function () {
    return view('siswa/ajukan_aduan/ajukan', [
        "title" => "Ajukan Aduan Siswa"
    ]);
})->name('aduansiswa');

Route::get('/sampletable', function () {
    return view('admin/sampletable', [
        "title" => "sampletable"
    ]);
})->name('sampletable');