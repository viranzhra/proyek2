<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sekolah;

class SekolahSeeder extends Seeder
{
    public function run()
    {
        Sekolah::create([
            'nama' => 'SMP NURUL HALIM WIDASARI',
            'npsn' => '20216093',
            'status_sekolah' => 'Swasta',
            'sk_pendirian' => '402/102/KEP/E/94',
            'tgl_sk_pendirian' => '1994-06-15',
            'status_kepemilikan' => 'Yayasan',
            'sk_izin_operasional' => '402/102/KEP/E/94',
            'tgl_sk_izin_operasional' => '1994-06-15',
            'npwp' => '027258441437000',
        ]);

        // Tambahkan data lain sesuai kebutuhan
    }
}
