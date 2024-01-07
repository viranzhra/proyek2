<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfilKepsek;

class ProfilKepsekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Contoh data kepala sekolah
        $kepsekData = [
            [
                'nama_kepsek' => 'Nama Kepala Sekolah 1',
                'alamat' => 'Alamat Kepala Sekolah 1',
                'foto_kepsek' => 'orang1.jpg', // Ganti dengan nama file foto
                'foto_bersama' => 'orang2.jpg',
            ]
        ];

        // Insert data ke dalam tabel ProfilKepsek
        foreach ($kepsekData as $data) {
            ProfilKepsek::create($data);
        }
    }
}
