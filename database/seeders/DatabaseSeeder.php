<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(UserSeeder::class);
        \App\Models\User::factory(100)->create();
        \App\Models\Lokasi::factory(100)->create();
        \App\Models\Toko::factory(100)->create();
        \App\Models\Produk::factory(100)->create();
        \App\Models\Kategori::factory(100)->create();
    }
}
