<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriTransaksi extends Model
{
    protected $table = 'kategori_transaksi';

    protected $fillable = [
        'deskripsi',
    ];

    public $timestamps = true;

    // Relasi dengan tabel TransaksiTabungan
    public function transaksiTabungans()
    {
        return $this->hasMany(TransaksiTabungan::class, 'id_kategori');
    }
}

