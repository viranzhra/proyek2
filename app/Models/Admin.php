<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Admin extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticatableTrait; // Tambahkan ini untuk menggunakan trait Authenticatable

    protected $table = 'admins';
    protected $fillable = ['username', 'email', 'password', 'jenis_kelamin', 'jabatan'];

    /**
     * Mendapatkan nama kolom yang digunakan sebagai identifier otentikasi.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Mendapatkan nilai identifier otentikasi (biasanya id).
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Mendapatkan kata sandi untuk otentikasi.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Mendapatkan "remember me" token jika digunakan.
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Menyimpan "remember me" token ke dalam basis data.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Mendapatkan nama kolom untuk "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}