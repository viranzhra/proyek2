<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiTabungan extends Model
{
    protected $table = 'transaksi_tabungan';

    protected $fillable = [
        'id_siswa',
        'tanggal',
        'id_kelas',
        'id_kategori',
        'total',
        'nominal',
    ];

    public $timestamps = true;

    // Relasi dengan tabel Murid
    public function murid()
    {
        return $this->belongsTo(Murid::class, 'id_siswa');
    }

    // Relasi dengan tabel KategoriTransaksi
    public function kategoriTransaksi()
    {
        return $this->belongsTo(KategoriTransaksi::class, 'id_kategori');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
