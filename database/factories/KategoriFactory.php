<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 100),
            'nama_kategori' => $this->faker->name,
            'slug_kategori' => Str::slug($this->faker->name),
            'cover_categori' => 'https://picsum.photos/200/300?' . $this->faker->numberBetween(1, 9999),
        ];
    }
}
