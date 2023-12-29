<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriAduanSeeder extends Seeder
{
    public function run()
    {
        $kategoriAduan = [
            ['ket_aduan' => 'Sekolah'],
            ['ket_aduan' => 'Tabungan'],
            // Tambahkan kategori aduan lainnya jika diperlukan
        ];

        DB::table('kategori_aduan')->insert($kategoriAduan);
    }
}
