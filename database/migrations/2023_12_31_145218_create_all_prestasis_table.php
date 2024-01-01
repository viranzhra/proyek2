<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllPrestasisTable extends Migration
{
    public function up()
    {
        Schema::create('all_prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('subjudul');
            $table->text('deskripsi');
            $table->string('foto_tampilan');
            $table->string('foto_dokumentasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('all_prestasis');
    }
}
