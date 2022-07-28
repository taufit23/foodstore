<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => 'hamdi@gmail.com',
            'nama' => $this->faker->name(),
            'password' => bcrypt('Angka1dan2!'),
        ];
    }
}
