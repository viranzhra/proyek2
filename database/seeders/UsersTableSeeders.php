<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    public function run(): void
    {
        // Masukkan data dummy ke tabel 'admins'
        DB::table('admins')->insert([
                'username' => 'Zahra01',
                'email' => 'syzahraaa12@gmail.com',
                'password' => Hash::make('12345'),
                'jenis_kelamin' => 'Perempuan',
                'jabatan' => 'admin 1'
            ]);

        DB::table('admins')->insert([
            'username' => 'ibra12',
            'email' => 'ibrah@gmail.com',
            'password' => Hash::make('67890'),
            'jenis_kelamin' => 'laki-laki',
            'jabatan' => 'admin 2'
        ]);

        DB::table('admins')->insert([
            'username' => 'hurul03',
            'email' => 'hurul@gmail.com',
            'password' => Hash::make('13579'),
            'jenis_kelamin' => 'perempuan',
            'jabatan' => 'admin 3'
        ]);
    }
}
