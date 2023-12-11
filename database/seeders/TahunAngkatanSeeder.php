<?php

namespace Database\Seeders;

use App\Models\TahunAngkatan;
use Illuminate\Database\Seeder;

class TahunAngkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        TahunAngkatan::create([
            'tahun' => '2021/2022',
        ]);

        TahunAngkatan::create([
            'tahun' => '2022/2023',
        ]);

        // Repeat for other years...

        TahunAngkatan::create([
            'tahun' => '2023/2024',
        ]);
    }
}

