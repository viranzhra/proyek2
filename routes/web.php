<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\SiswaLoginController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\PdfDatasiswaController;
use App\Http\Controllers\PdfTransaksiController;
use App\Http\Controllers\SiswaRiwayatController;
use App\Http\Controllers\ArsipTabunganController;
use App\Http\Controllers\TransaksiTabunganController;
use App\Http\Controllers\PemasukkanTabunganController;
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

Route::get('/', [SekolahController::class, 'index'])->name('sekolah.index');

Route::get('/visimisi', function () {
    return view('visi_misi', [
        "title" => "Visi Misi"
    ]);
})->name('visi_misi');

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

    Route::get('/identitas-sekolah', [SekolahController::class, 'showIdentitasSekolah'])->name('identitas-sekolah');
    Route::get('/edit', [SekolahController::class, 'edit'])->name('sekolah.edit');
    Route::put('/update', [SekolahController::class, 'update'])->name('sekolah.update');

    Route::get('/siswa_ajukan_aduan', [AduanController::class, 'index'])->name('ajukan-aduan.index');
    Route::get('/siswa/ajukan_aduan/create', [AduanController::class, 'create'])->name('ajukan-aduan.create');
    Route::post('/siswa/ajukan_aduan', [AduanController::class, 'store'])->name('ajukan-aduan.store');
    Route::get('/siswa/ajukan_aduan/{id}', [AduanController::class, 'show'])->name('ajukan-aduan.show');
    Route::get('/siswa/ajukan_aduan/{id}/edit', [AduanController::class, 'edit'])->name('ajukan-aduan.edit');
    Route::put('/siswa/ajukan_aduan/{id}', [AduanController::class, 'update'])->name('ajukan-aduan.update');
    Route::delete('/siswa/ajukan_aduan/{id}', [AduanController::class, 'destroy'])->name('ajukan-aduan.destroy');

    Route::get('/pemasukkan-tabungan', [PemasukkanTabunganController::class, 'index'])->name('pemasukkan-tabungan.index');
    Route::get('/pemasukkan-tabungan/create', [PemasukkanTabunganController::class, 'create'])->name('pemasukan.create');
    Route::post('/pemasukkan-tabungan/store', [PemasukkanTabunganController::class, 'store'])->name('pemasukkan.store');

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

    Route::get('/editdata', function () {
        return view('admin/data_siswa/edit', [
            "title" => "Pemasukkan Kelas 9"
        ]);
    })->name('pemasukan3');

    // Menampilkan data siswa
    Route::get('/datasiswa', [DataSiswaController::class, 'index'])->name('datasiswa');
    Route::get('/data_admin', [AdminController::class, 'index'])->name('admin.data_admin.data_admin');

    // Menampilkan form tambah data siswa
    Route::get('/siswa/create', [DataSiswaController::class, 'create'])->name('siswa.create');

    // Menyimpan data siswa baru
    Route::post('/siswa', [DataSiswaController::class, 'store'])->name('siswa.store');

    // Menampilkan form edit data siswa
    Route::get('/siswa/{nisn}/edit', [DataSiswaController::class, 'edit'])->name('siswa.edit');

    // Mengupdate data siswa
    Route::put('/siswa/{nisn}/update', [DataSiswaController::class, 'update'])->name('siswa.update');

    // Menghapus data siswa
    Route::delete('/siswa/{nisn}/destroy', [DataSiswaController::class, 'destroy'])->name('siswa.destroy');

    Route::resource('transaksi-tabungan', TransaksiTabunganController::class);
    Route::put('/transaksi-tabungan/{id}/update', [TransaksiTabunganController::class, 'update'])->name('transaksi-tabungan.update');
    Route::delete('/transaksi-tabungan/{nisn}/destroy', [DataSiswaController::class, 'destroy'])->name('transaksi-tabungan.destroy');
    // Rute untuk menambahkan saldo
    Route::post('/transaksi-tabungan/{nisn}/tambah-saldo', [TransaksiTabunganController::class, 'tambahSaldo'])
        ->name('transaksi-tabungan.tambah-saldo');

    Route::get('/download-pdf', [PdfTransaksiController::class, 'downloadPDF'])->name('download-pdf');
    Route::get('/download-pdf-siswa', [PdfDatasiswaController::class, 'downloadPDF'])->name('download-pdf-siswa');
    Route::get('/get-murid-name/{id}', [TransaksiTabunganController::class, 'getMuridName']);
    Route::get('/get-class-by-student', [TransaksiTabunganController::class, 'getClassByStudent'])
        ->name('transaksi-tabungan.getClassByStudent');
    
    Route::get('/arsipan', [ArsipTabunganController::class, 'index'])->name('arsipan.index');
    Route::get('/arsipan/download-pdf', [ArsipTabunganController::class, 'downloadPdf'])->name('arsipan.downloadPdf');

    Route::get('/aduansiswa', [AduanController::class, 'index'])->name('form.aduan.index');
    Route::post('/aduansiswa', [AduanController::class, 'store'])->name('form.aduan.store');

    Route::get('/update-profile-form', [AdminProfileController::class, 'showUpdateForm'])->name('admin.update.profile.form');
    Route::post('/update-profile', [AdminProfileController::class, 'updateProfile'])->name('admin.update.profile');
});

Route::get('/profilguru', function () {
    return view('profilguru', [
        "title" => "Profil Guru"
    ]);
})->name('profilguru');

// Rute untuk menampilkan formulir login admin
Route::get('/loginadmin', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');

// Rute untuk menangani proses login admin
Route::post('/loginadmin', [AdminLoginController::class, 'login'])->name('admin.login');

Route::post('/logoutadmin', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth:web'])->group(function () {  

    Route::get('/home_siswa', function () {
        return view('siswa/home/home_siswa', [
            "title" => "Home"
        ]);
    })->name('home_siswa');

    Route::get('/profilsiswa', function () {
        return view('siswa/profil/profil', [
            "title" => "Profil Siswa"
        ]);
    })->name('profilsiswa');

    Route::get('/riwayat_siswa', [SiswaRiwayatController::class, 'index'])->name('riwayat_siswa');

    // Tambahkan rute atau logika lainnya yang memerlukan otentikasi siswa
});

Route::get('/aduansiswa_form', [AduanController::class, 'showForm'])->name('form.aduan');


Route::get('/sampletable', function () {
    return view('admin/sampletable', [
        "title" => "sampletable"
    ]);
})->name('sampletable');

Route::get('/isisaldo', function () {
    return view('admin/pemasukkan/isi_saldo', [
        "title" => "isisaldo"
    ]);
})->name('isisaldo');

Route::get('/loginsiswa', [SiswaLoginController::class, 'showLoginForm'])->name('siswa.login');
Route::post('/siswa-login', [SiswaLoginController::class, 'login']);
Route::post('/siswa-logout', [SiswaLoginController::class, 'logout'])->name('siswa.logout');
Route::get('/riwayat', [TransaksiTabunganController::class, 'index'])->name('riwayat');
