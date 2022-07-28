<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'name' => 'Zul Hamdi Islamie',
        'email' => 'zulhamdiislamie25@gmail.com',//ganti pake emailmu
        'password' => Hash::make('19980825'),//passwordnya 19980825
        'no_hp' => '082287553138',
        'alamat' => 'Kampung Baru, Kec.Kampar, Riau',
        'role' => 'admin',//kita akan membuat akun atau users in dengan role admin
        ]);

        DB::table('users')->insert([
            'name' => 'Andi Saputra',
            'email' => 'andisaputra@gmail.com',//ganti pake emailmu
            'password' => Hash::make('andi12345'),//passwordnya 19980825
            'no_hp' => '082287553138',
            'alamat' => 'Koto, Kec.Kampar, Riau',
            'role' => 'seller',//kita akan membuat akun atau users in dengan role admin
            ]);

        DB::table('users')->insert([
        'name' => 'Agus Salim',
        'email' => 'agussalim@gmail.com',//ganti pake emailmu
        'password' => Hash::make('agus12345'),//passwordnya 19980825
        'no_hp' => '082200000000',
        'alamat' => 'Pasar Kuok, Kec.Kampar, Riau',
        'role' => 'customer',//kita akan membuat akun atau users in dengan role admin
        ]);
    }
}
