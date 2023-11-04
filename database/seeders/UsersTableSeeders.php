<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeders extends Seeder
{
    public function run(): void
    {
        DB::table('admin')->insert([
            'id_admin'=>'1',
            'nama_admin'=>'Zahra',
            'email'=>'syzahraaa12@gmail.com',
            'password'=>Hash::make(12345),
            'jenis_kelamin'=>'Perempuan',
            'jabatan'=>'admin 1'
        ]);
    }
}
