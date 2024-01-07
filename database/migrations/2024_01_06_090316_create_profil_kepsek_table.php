<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilKepsekTable extends Migration
{
    public function up()
    {
        Schema::create('profil_kepsek', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kepsek');
            $table->text('alamat');
            $table->string('foto_kepsek');
            $table->string('foto_bersama')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profil_kepsek');
    }
}
