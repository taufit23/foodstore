<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
class TokoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $uniquename = $this->faker->unique()->name();
        return [

            'user_id' =>$this->faker->numberBetween(1, 10) ,
            'nama_usaha' => $uniquename,
            'slug_usaha' => Str::slug($uniquename, '_'),
            'Keterangan' => $this->faker->text($maxNbChars = 200),
            'alamat' => $this->faker->text($maxNbChars = 200),
            'cover' => 'https://picsum.photos/200/300?' . $this->faker->numberBetween(1, 9999),
            'status' => 'nonactive',
        ];
    }
}
