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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nama');
            $table->string('email');
            $table->string('no_hp');
            $table->string('perguruan_tinggi');
            $table->string('nik');
            $table->string('jenis_kelamin');
            $table->string('tanggal_masuk');
            $table->string('jenis_kamar');
            $table->string('jenis_pembayaran');
            $table->string('status_pemesanan');
            $table->string('nomor_kamar');
            $table->string('keterangan')->nullable();
            $table->string('total_tagihan')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
