<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RevertModifyAduanSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aduan_siswa', function (Blueprint $table) {
            // Revert 'id_aduan' to be non-nullable
            $table->unsignedBigInteger('id_aduan')->nullable(false)->change();

            // Revert 'aduan' to be non-nullable
            $table->text('aduan')->nullable(false)->change();

            // Revert 'bukti_aduan' to be non-nullable
            $table->string('bukti_aduan')->nullable(false)->change();
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
