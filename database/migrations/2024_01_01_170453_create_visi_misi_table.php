<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisiMisiTable extends Migration
{
    public function up()
    {
        Schema::create('visi_misi', function (Blueprint $table) {
            $table->id();
            $table->string('judul_halaman');
            $table->text('visi');
            $table->text('misi');
            $table->text('tujuan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visi_misi');
    }
}
