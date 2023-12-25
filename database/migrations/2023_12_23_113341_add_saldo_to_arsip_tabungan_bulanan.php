<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSaldoToArsipTabunganBulanan extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('arsip_tabungan_bulanan', function (Blueprint $table) {
            $table->decimal('saldo', 10, 2)->after('total')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('arsip_tabungan_bulanan', function (Blueprint $table) {
            $table->dropColumn('saldo');
        });
    }
}

