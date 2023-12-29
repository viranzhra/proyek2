<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriAduanTable extends Migration
{
    public function up()
    {
        Schema::create('kategori_aduan', function (Blueprint $table) {
            $table->id();
            $table->string('ket_aduan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_aduan');
    }
}
