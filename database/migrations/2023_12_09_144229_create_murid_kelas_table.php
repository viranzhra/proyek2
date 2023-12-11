<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuridKelasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('murid_kelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->foreignId('id_kelas')->constrained('kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_ta');
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('murid')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_ta')->references('id')->on('tahun_angkatan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('murid_kelas');
    }
};