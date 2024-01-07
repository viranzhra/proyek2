<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilKepsek extends Model
{
    use HasFactory;

    protected $table = 'profil_kepsek';

    protected $fillable = ['nama_kepsek', 'alamat', 'foto_kepsek', 'foto_bersama'];
}
