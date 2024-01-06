<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEskulTable extends Migration
{
    public function up()
    {
        Schema::create('eskuls', function (Blueprint $table) {
            $table->id();
            $table->string('subjudul');
            $table->text('deskripsi');
            $table->string('foto_tampilan');
            $table->string('foto_dokumentasi1')->nullable();
            $table->string('foto_dokumentasi2')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eskuls');
    }
}
