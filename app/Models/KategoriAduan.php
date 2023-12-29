<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAduan extends Model
{
    use HasFactory;

    protected $table = 'kategori_aduan';

    protected $fillable = [
        'ket_aduan',
    ];

    // Jika ada relasi dengan tabel aduan_siswa, tambahkan relasi di sini
    // public function aduanSiswa()
    // {
    //     return $this->hasMany(AduanSiswa::class, 'id_kategori_aduan');
    // }
}
