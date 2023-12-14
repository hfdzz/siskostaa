<?php

namespace Database\Factories\ProfileKost;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProfileKost\Fasilitas>
 */
class FasilitasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // one to three words in a sentence
            'deskripsi_fasilitas' => $this->faker->sentence($nbWords = 2, $variableNbWords = true),
            'foto_fasilitas' => null,
        ];
    }
}
