<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tagihan>
 */
class TagihanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(['0', '1', '2']),
            'keterangan' => $this->faker->text(),
            'bukti_pembayaran' => '../Assets/default_img/placeholder_bukti_pembayaran.png',
            'pemesanan_id' => $this->faker->randomNumber(),
        ];
    }
}
