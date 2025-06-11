<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Admin', 'email' => 'admin@mail.com', 'password' => Hash::make('12345678'), 'role' => 'admin'],
            ['name' => 'Contador', 'email' => 'contador@mail.com', 'password' => Hash::make('12345678'), 'role' => 'contador'],
            ['name' => 'Campo', 'email' => 'campo@mail.com', 'password' => Hash::make('12345678'), 'role' => 'campo'],
            ['name' => 'Almacen', 'email' => 'almacen@mail.com', 'password' => Hash::make('12345678'), 'role' => 'almacen'],
        ]);
    }
}
