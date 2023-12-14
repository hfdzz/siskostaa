<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Kamar;
use App\Models\Pemesanan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kamar>
 */
class KamarFactory extends Factory
{
    // kode_kamar notation: [nomor_kamar][kode_gedung]
    // kode_gedung is ['A', 'B', 'C']
    // each kode_gedung has nomor_kamar range from 1 to 100
    // all kode_kamar is unique
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kode_gedung = $this->faker->randomElement(['A', 'B', 'C']);
        return [
            'nomor_kamar' => $this->getNextNomorKamar($kode_gedung),
            'kode_gedung' => $kode_gedung,
            'jenis_kamar' => $this->faker->randomElement(['ac', 'non_ac']),
            'status_available' => '1',
            'pemesanan_id' => null,
        ];
    }

    public function getNextNomorKamar($kode_gedung)
    {
        $last_kamar = Kamar::where('kode_gedung', $kode_gedung)->orderBy('nomor_kamar', 'desc')->first();
        $last_nomor_kamar = $last_kamar ? $last_kamar->nomor_kamar : 0;
        return $last_nomor_kamar + 1;
    }
}
