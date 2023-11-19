<?php

namespace Database\Factories\ProfileKost;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProfileKost\Tentang>
 */
class TentangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'deskripsi_tentang' => $this->faker->sentence(),
            'foto_tentang' => '../Assets/default_img/default_tentang.png',
        ];
    }
}
