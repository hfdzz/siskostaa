<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tagihan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemesanan>
 */
class PemesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'no_hp' => $this->faker->phoneNumber(),
            'perguruan_tinggi' => $this->faker->company(),
            'nik' => $this->faker->randomNumber(8).''.$this->faker->randomNumber(8),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'tanggal_masuk' => $this->faker->date(),
            'jenis_kamar' => $this->faker->randomElement(['ac', 'non_ac']),
            'jenis_pembayaran' => $this->faker->randomElement(['penuh', 'dp']),
            'status' => $this->faker->randomElement(['0', '1', '2', '3']),
            'nomor_kamar' => $this->faker->unique()->randomNumber(3),
            'keterangan' => $this->faker->text(),
            'total_tagihan' => $this->faker->randomNumber(),
            'user_id' => $this->faker->randomNumber(),
        ];
    }
}
