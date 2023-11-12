<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'nama' => 'Test User',
            'email' => 'test@test.com',
        ]);

        \App\Models\Pemesanan::factory()->create([
            'nama' => 'Test User',
            'email' => 'test@test.com',
            'no_hp' => '081234567890',
            'perguruan_tinggi' => 'Universitas Test',
            'nik' => '1234567890123456',
            'jenis_kelamin' => 'L',
            'tanggal_masuk' => '2021-11-01',
            'jenis_kamar' => 'ac',
            'jenis_pembayaran' => 'penuh',
            'status_pemesanan' => '0',
            'nomor_kamar' => '0',
            'keterangan' => 'pmsn - ket',
            'user_id' => '1',
        ]);

        \App\Models\Tagihan::factory()->create([
            'status' => '0',
            'keterangan' => 'tgh - ket',
            'bukti_pembayaran' => null,
            'pemesanan_id' => '1',
        ]);
    }
}
