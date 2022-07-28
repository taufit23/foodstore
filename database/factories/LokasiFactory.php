<?php

namespace Database\Factories;

use App\Models\Lokasi;
use Illuminate\Database\Eloquent\Factories\Factory;
class LokasiFactory extends Factory
{
    protected $model = Lokasi::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $lang = 0.327322;
        $long = 101.028960;
        return [
            'toko_id'=> $this->faker->unique(true)->numberBetween($min = 0, $max = 100),
            'user_id'=> $this->faker->unique(true)->numberBetween($min = 0, $max = 100),
            'latitude' => $this->faker->latitude(
                $min = ($lang * 10000 - rand(0, 1000)) / 10000,
                $max = ($lang * 10000 + rand(0, 1000)) / 10000
            ),

            'longitude' => $this->faker->longitude(
                $min = ($long * 10000 - rand(0, 1000)) / 10000,
                $max = ($long * 10000 + rand(0, 1000)) / 10000
            ),
        ];
    }
}
