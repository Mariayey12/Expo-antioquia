<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Maria Helenn Moron',
                'email' => 'mmbhhsa.33@gmail.com',
                'email_verified_at' => null, // Cambiado a null
                'password' => Hash::make('password123'), // Usando Hash para cifrar la contraseña
                'phone' => '8969666666', // Tratando el teléfono como string
                'address' => '254 33',
                'remember_token' => null, // Cambiado a null, no es necesario inicialmente
               
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}

