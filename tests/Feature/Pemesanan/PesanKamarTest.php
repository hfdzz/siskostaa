<?php

namespace Tests\Feature\Pemesanan;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PesanKamarTest extends TestCase
{
    use RefreshDatabase;

    public function test_pemesanan_screen_can_be_rendered(): void
    {
        $response = $this->get('/pesan');

        $response->assertStatus(200);
    }

    public function test_user_without_existing_pemesanan_can_pesan(): void
    {
        $response = $this->post('/pesan', [
            'nama' => 'Test User',
            'email' => 'test@test.com',
            'no_hp' => '081234567890',
            'perguruan_tinggi' => 'Universitas Test',
            'nik' => '1234567890123456',
            'jenis_kelamin' => 'L',
            'tanggal_masuk' => '2021-01-01',
            'jenis_kamar' => 'ac',
            'jenis_pembayaran' => 'penuh',
        ]);

        $response->assertRedirect('/statuspesan');
    }
}
