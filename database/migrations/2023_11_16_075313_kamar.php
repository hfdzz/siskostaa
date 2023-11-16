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
        Schema::create('kamar', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_kamar');
            $table->string('kode_gedung');
            $table->string('jenis_kamar');
            $table->string('status_available');
            $table->timestamps();

            $table->foreignId('pemesanan_id')->nullable()->constrained('pemesanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar');
    }
};
