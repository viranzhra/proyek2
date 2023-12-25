<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArsipTabungan extends Model
{
    protected $table = 'arsip_tabungan_bulanan';

    protected $fillable = [
        'id_siswa',
        'id_kelas',
        'tanggal_arsip',
        'total',
        'saldo'
    ];

    public $timestamps = true;

    // Relasi dengan tabel Murid
    public function murid()
    {
        return $this->belongsTo(Murid::class, 'id_siswa');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
