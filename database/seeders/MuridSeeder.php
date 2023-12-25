<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder; // Pastikan menggunakan namespace yang benar
use App\Models\Murid;
use App\Models\Kelas;
use App\Models\TahunAngkatan;

class MuridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ambil semua id_kelas dan id_ta yang ada di tabel kelas dan tahun_angkatan
        $kelasIds = Kelas::pluck('id')->toArray();
        $tahunAngkatanIds = TahunAngkatan::pluck('id')->toArray();

        // Buat data murid dengan nilai id_kelas dan id_ta yang diambil secara acak
        for ($i = 0; $i < 100; $i++) {
            Murid::factory()->create([
                'id_kelas' => Murid::factory()->raw()['id_kelas'],
                'id_ta' => Murid::factory()->raw()['id_ta'],
            ]);
        }
    }
}
