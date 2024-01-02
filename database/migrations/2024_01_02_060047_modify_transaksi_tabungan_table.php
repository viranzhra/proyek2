<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('transaksi_tabungan', function (Blueprint $table) {
            $table->date('tanggal')->nullable()->change();
            $table->unsignedBigInteger('id_kategori')->nullable()->change();
            $table->decimal('nominal', 10, 2)->nullable()->change();
        });
    }
    
    public function down()
    {
        // Jika perlu, tambahkan logika untuk melakukan revert perubahan di sini
    }
    
};
