<?php

namespace Tests\Feature\Pemesanan;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PesanKamarTest extends TestCase
{
    use RefreshDatabase;

    public function test_logged_in_user_can_access_pesan_page(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get('/pesan');

        $response->assertStatus(200);
    }

    public function test_user_without_existing_pemesanan_can_pesan(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->post('/pesan', [
                'nama' => 'John Doe',
                'email' => $user->email,
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

    public function test_user_with_existing_pemesanan_cannot_pesan(): void
    {
        $user = User::factory()->create();
        $user->pemesanan()->create([
            'nama' => 'John Doe',
            'email' => $user->email,
            'no_hp' => '081234567890',
            'perguruan_tinggi' => 'Universitas Test',
            'nik' => '1234567890123456',
            'jenis_kelamin' => 'L',
            'tanggal_masuk' => '2021-01-01',
            'jenis_kamar' => 'ac',
            'jenis_pembayaran' => 'penuh',
            'status_pemesanan' => '0',
            'nomor_kamar' => '0',
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)
            ->post('/pesan', [
                'nama' => 'John Doe',
                'email' => $user->email,
                'no_hp' => '081234567890',
                'perguruan_tinggi' => 'Universitas Test',
                'nik' => '1234567890123456',
                'jenis_kelamin' => 'L',
                'tanggal_masuk' => '2021-01-01',
                'jenis_kamar' => 'ac',
                'jenis_pembayaran' => 'penuh',
            ]);

        $response->assertRedirect('/pesan');
        $response->assertSessionHasErrors(['pemesanan' => 'Anda sudah memiliki pemesanan yang belum selesai']);
    }
}
