<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllPrestasi extends Model
{
    use HasFactory;

    protected $table = 'all_prestasis';
    protected $fillable = [
        'subjudul',
        'deskripsi',
        'foto_tampilan',
        'foto_dokumentasi',
    ];
}
