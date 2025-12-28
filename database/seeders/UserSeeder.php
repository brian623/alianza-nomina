<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Elisa',
            'lastname' => 'Gómez',
            'user' => 'Pruebadesarrollador',
            'password' => Hash::make('12345678'),
        ]);
    }
}
