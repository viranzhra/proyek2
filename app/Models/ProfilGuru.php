<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilGuru extends Model
{
    use HasFactory;

    protected $table = 'profil_guru';
    protected $fillable = ['nama_guru', 'jabatan', 'alamat', 'foto_guru'];
}
