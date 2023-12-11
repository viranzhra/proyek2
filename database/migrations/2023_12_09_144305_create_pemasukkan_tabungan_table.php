<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasukkanTabunganTable extends Migration
{
    public function up()
    {
        Schema::create('pemasukkan_tabungan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');            $table->date('tanggal_pemasukkan');
            $table->decimal('nominal', 10, 2);
            $table->decimal('total', 10, 2)->default(0); // Tambahkan kolom total di sini
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('murid')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemasukkan_tabungan');
    }
}