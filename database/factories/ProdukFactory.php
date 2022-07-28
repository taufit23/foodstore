<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $productname = $this->faker->company();
        return [
            'kategori_id' => $this->faker->numberBetween(1, 100),
            'user_id' => $this->faker->numberBetween(1, 10),
            'toko_id' => $this->faker->numberBetween(1, 100),
            'nama_produk' => $productname,
            'slug_produk' => Str::slug($productname),
            'deskripsi_produk' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'cover_produk' => 'https://picsum.photos/200/300?' . $this->faker->numberBetween(1, 9999),
            'qty' => $this->faker->numberBetween(1, 1000),
            'harga' => $this->faker->randomNumber(2),
        ];
    }
}
