<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAngkatan extends Model
{
    protected $table = 'tahun_angkatan';

    public function murids()
    {
        return $this->hasMany(Murid::class, 'id_ta');
    }
}

