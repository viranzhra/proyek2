<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolah';
    protected $fillable = [
        'nama',
        'npsn',
        'status_sekolah',
        'sk_pendirian',
        'tgl_sk_pendirian',
        'status_kepemilikan',
        'sk_izin_operasional',
        'tgl_sk_izin_operasional',
        'npwp',
    ];
}
