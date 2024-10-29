<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan_kendaraan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kendaraan')->references('id')->on('kendaraan');
            $table->foreignId('id_driver')->references('id')->on('driver');
            $table->foreignId('id_pengaju')->references('id')->on('users');
            $table->foreignId('pihak_penyetuju')->references('id')->on('users');
            $table->foreignId('status')->references('id')->on('status_pesanan');
            $table->date('tanggal_pemesanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_kendaraan');
    }
};
