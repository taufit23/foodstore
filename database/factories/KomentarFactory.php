<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KomentarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'toko_id' => $this->faker->numberBetween(1, 2),
            'nama_costumer' => $this->faker->name(),
            'komentar' => $this->faker->realText($maxNbChars = 200, $indexSize = 3  ),
        ];
    }
}
