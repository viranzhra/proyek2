<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins'; // Nama tabel yang terkait dengan model Admin
    protected $fillable = ['username', 'email', 'password', 'profile_picture']; // Kolom yang dapat diisi secara massal, memungkinkan pengisian data pada saat pembuatan atau pembaruan
}
