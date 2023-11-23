<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('jenis_kelamin');
            $table->string('jabatan');
            $table->timestamps(); // Kolom created_at dan updated_at untuk mencatat waktu pembuatan dan pembaruan data
        });
    }

    public function down()
    {
        // Menghapus tabel 'admins' jika migrasi di-rollback atau di-reverse
        Schema::dropIfExists('admins');
    }
}
