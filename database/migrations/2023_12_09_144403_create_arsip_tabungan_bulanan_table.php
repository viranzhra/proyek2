<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipTabunganBulananTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('arsip_tabungan_bulanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->date('tanggal_arsip');
            $table->decimal('total', 10, 2);
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('murid')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('arsip_tabungan_bulanan');
    }
};