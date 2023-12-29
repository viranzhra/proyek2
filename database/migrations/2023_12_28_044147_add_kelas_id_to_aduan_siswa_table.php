<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKelasIdToAduanSiswaTable extends Migration
{
    public function up()
    {
        Schema::table('aduan_siswa', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kelas')->after('id_siswa')->nullable();
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('aduan_siswa', function (Blueprint $table) {
            $table->dropForeign(['id_kelas']);
            $table->dropColumn('id_kelas');
        });
    }
}
