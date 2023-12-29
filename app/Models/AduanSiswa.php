<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AduanSiswa extends Model
{
    use HasFactory;

    protected $table = 'aduan_siswa';

    protected $fillable = [
        'id_siswa',
        'id_kelas', 
        'id_aduan',
        'aduan',
        'bukti_aduan',
    ];

    public function murid()
    {
        return $this->belongsTo(Murid::class, 'id_siswa');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function kategoriAduan()
    {
        return $this->belongsTo(KategoriAduan::class, 'id_aduan');
    }
}
