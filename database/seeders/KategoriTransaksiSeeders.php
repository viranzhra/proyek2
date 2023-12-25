<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KategoriTransaksiSeeders extends Seeder
{
    public function run(): void
    {
        // Masukkan data dummy ke tabel 'admins'
        DB::table('kategori_transaksi')->insert([
            'deskripsi' => 'Pemasukkan'
         ]);
        
        DB::table('kategori_transaksi')->insert([
            'deskripsi' => 'Pengeluaran'
        ]);
    }
}
