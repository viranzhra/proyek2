<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use App\Models\Kelas;
use App\Models\TahunAngkatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Murid extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;
    protected $table = 'murid';

    protected $fillable = [
        'nisn_murid',
        'nama_murid',
        'jenis_kelamin',
        'tgl_lahir',
        'id_kelas',
        'id_ta',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function tahunAngkatan()
    {
        return $this->belongsTo(TahunAngkatan::class, 'id_ta');
    }
}
