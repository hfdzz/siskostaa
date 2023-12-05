<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tentang Kost
        \App\Models\ProfileKost\Tentang::factory()->create([
            "deskripsi_tentang"=>"Kost Abang Adek merupakan kosan khusus mahasiswa dengan konsep apartemen yang terletak di Jl. Pangeran Senopati Raya, Sukarame, Bandar Lampung. Lokasi kost ini sangat strategis, dekat dengan kampus, masjid, toko swalayan, rumah makan, laundry, dan penyedia layanan lainnya yang dibutukan oleh penghuni.

            Kalau Anda mencari kosan yang nyaman, aman, tentram, dan asri : Kost Abang Adek solusinya!",

            "foto_tentang"=>null
        ]);

        // Fasilitas Kost\
        \App\Models\ProfileKost\Fasilitas::factory()->create([
            'deskripsi_fasilitas'=>'Kamar Fully Furnished',
            'foto_fasilitas'=>null
        ]);
        \App\Models\ProfileKost\Fasilitas::factory()->create([
            'deskripsi_fasilitas'=>'Kamar Mandi Dalam',
            'foto_fasilitas'=>null
        ]);
        \App\Models\ProfileKost\Fasilitas::factory()->create([
            'deskripsi_fasilitas'=>'Free WiFi',
            'foto_fasilitas'=>null
        ]);
        \App\Models\ProfileKost\Fasilitas::factory()->create([
            'deskripsi_fasilitas'=>'Kantin',
            'foto_fasilitas'=>null
        ]);
        \App\Models\ProfileKost\Fasilitas::factory()->create([
            'deskripsi_fasilitas'=>'Ruang Belajar',
            'foto_fasilitas'=>null
        ]);
        \App\Models\ProfileKost\Fasilitas::factory()->create([
            'deskripsi_fasilitas'=>'Parkiran Luas',
            'foto_fasilitas'=>null
        ]);
        \App\Models\ProfileKost\Fasilitas::factory()->create([
            'deskripsi_fasilitas'=>'Token Listrik Tiap Kamar',
            'foto_fasilitas'=>null
        ]);
        \App\Models\ProfileKost\Fasilitas::factory()->create([
            'deskripsi_fasilitas'=>'Free Air',
            'foto_fasilitas'=>null
        ]);


         // admin
         \App\Models\User::factory()->create([
            'nama' => 'admin',
            'email' => 'admin@localhost',
            'is_admin' => '1',
            'password' => bcrypt('password'),
        ]);

        // faq
        \App\Models\ProfileKost\Faq::factory()->create([
            "pertanyaan"=>"Apakah masyarakat umum bisa menempati kost ini?",
            "jawaban"=>"Kost Abang Adek merupakan Kost khusus mahasiswa."
        ]);

        \App\Models\ProfileKost\Faq::factory()->create([
            "pertanyaan"=>"Dimana lokasi Kost Abang Adek?",
            "jawaban"=>"Jl. Pangeran Senopati Raya No.18, Harapan Jaya, Kec. Sukarame, Kota Bandar Lampung, Lampung 35131"
        ]);

        \App\Models\ProfileKost\Faq::factory()->create([
            "pertanyaan"=>"Ada kamar yang ber-AC nggak?",
            "jawaban"=>"Ada. Tinggal request untuk menambahkan AC di kamar."
        ]);

        \App\Models\ProfileKost\Faq::factory()->create([
            "pertanyaan"=>"Bagaimana dengan penggunaan Listrik kamar?",
            "jawaban"=>"Kami menggunakan listrik prabayar (token) untuk masing-masing kamar"
        ]);

        \App\Models\ProfileKost\Faq::factory()->create([
            "pertanyaan"=>"Bagaimana dengan iuran air?",
            "jawaban"=>"Tidak perlu membayar penggunaan air."
        ]);

        \App\Models\ProfileKost\Faq::factory()->create([
            "pertanyaan"=>"Bisa bayar DP terlebih dahulu?",
            "jawaban"=>"Bisa, kami menerima pembayaran DP untuk memesan kamar. Dan setelahnya akan diberi tenggat waktu pelunasannya."
        ]);

    }
}
