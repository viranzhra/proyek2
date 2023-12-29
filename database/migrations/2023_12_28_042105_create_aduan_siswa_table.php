<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAduanSiswaTable extends Migration
{
    public function up()
    {
        Schema::create('aduan_siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_aduan');
            $table->unsignedBigInteger('id_siswa');
            $table->text('aduan');
            $table->timestamps();

            $table->foreign('id_aduan')->references('id')->on('kategori_aduan')->onDelete('cascade');
            $table->foreign('id_siswa')->references('id')->on('murid')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('aduan_siswa');
    }
}
