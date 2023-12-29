<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahTable extends Migration
{
    public function up()
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('npsn');
            $table->string('status_sekolah');
            $table->string('sk_pendirian');
            $table->date('tgl_sk_pendirian');
            $table->string('status_kepemilikan');
            $table->string('sk_izin_operasional');
            $table->date('tgl_sk_izin_operasional');
            $table->string('npwp');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sekolah');
    }
}