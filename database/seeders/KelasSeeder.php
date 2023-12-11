<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Kelas::create([
            'ket_kelas' => 'Kelas 7A',
        ]);
    
        Kelas::create([
            'ket_kelas' => 'Kelas 7B',
        ]);
    
        Kelas::create([
            'ket_kelas' => 'Kelas 7C',
        ]);
    
        Kelas::create([
            'ket_kelas' => 'Kelas 7D',
        ]);
    
        Kelas::create([
            'ket_kelas' => 'Kelas 8A',
        ]);
    
        Kelas::create([
            'ket_kelas' => 'Kelas 8B',
        ]);
    
        Kelas::create([
            'ket_kelas' => 'Kelas 8C',
        ]);
    
        Kelas::create([
            'ket_kelas' => 'Kelas 8D',
        ]);
    
        Kelas::create([
            'ket_kelas' => 'Kelas 9A',
        ]);
    
        Kelas::create([
            'ket_kelas' => 'Kelas 9B',
        ]);
    
        Kelas::create([
            'ket_kelas' => 'Kelas 9C',
        ]);
    }
}  