<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    public function murids()
    {
        return $this->hasMany(Murid::class, 'id_kelas');
    }
}
