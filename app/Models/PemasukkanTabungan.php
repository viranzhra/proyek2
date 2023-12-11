<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PemasukkanTabungan extends Model
{
    use HasFactory;

    protected $table = 'pemasukkan_tabungan';

    protected $fillable = ['id_siswa', 'tanggal_pemasukkan', 'nominal', 'total'];
    public function siswa()
    {
        return $this->belongsTo(Murid::class, 'id_siswa');
    }
}

