<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyAduanSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aduan_siswa', function (Blueprint $table) {
            // Modify 'id_aduan' to be nullable
            $table->unsignedBigInteger('id_aduan')->nullable()->change();

            // Modify 'aduan' to be nullable
            $table->text('aduan')->nullable()->change();

            // Modify 'bukti_aduan' to be nullable
            $table->string('bukti_aduan')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // You can implement the reverse migration logic if needed
    }
}
