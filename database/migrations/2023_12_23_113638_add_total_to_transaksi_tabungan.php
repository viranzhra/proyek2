<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalToTransaksiTabungan extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('transaksi_tabungan', function (Blueprint $table) {
            $table->decimal('total', 10, 2)->after('nominal')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('transaksi_tabungan', function (Blueprint $table) {
            $table->dropColumn('total');
        });
    }
}
