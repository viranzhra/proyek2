<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Ganti jumlah user sesuai kebutuhan
        $jumlahUser = 10;

        // Ambil semua siswa dari tabel murid
        $murids = DB::table('murid')->get();

        foreach ($murids as $siswa) {
            for ($i = 1; $i <= $jumlahUser; $i++) {
                // Ganti 'email' sesuai dengan kebutuhan format alamat email Anda
                DB::table('users')->insert([
                    'id_siswa' => $siswa->id,
                    'email' => strtolower(str_replace(' ', '', $siswa->nama_murid)) . $i . '@example.com',
                    'password' => 'password' . $i, // Simpan password tanpa hashing
                    // tambahkan kolom lain sesuai kebutuhan
                ]);
            }
        }
    }
}
