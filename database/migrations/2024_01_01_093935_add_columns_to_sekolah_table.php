<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sekolah', function (Blueprint $table) {
            $table->text('deskripsi_sekolah')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('email_sekolah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sekolah', function (Blueprint $table) {
            $table->dropColumn('deskripsi_sekolah');
            $table->dropColumn('no_telp');
            $table->dropColumn('email_sekolah');
        });
    }
}
