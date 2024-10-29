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
                
            ],

            [
                'name' => 'Administrador',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secureAdminPass123'),
                'phone' => '1234567890',
                'address' => 'Admin Address',
                'role' => 'admin',
                'remember_token' => null,
            ],
            [
                'name' => 'Usuario Normal',
                'email' => 'user@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secureUserPass123'),
                'phone' => '0987654321',
                'address' => 'User Address',
                'role' => 'user',
                'remember_token' => null,
            ],
            [
                'name' => 'Superusuario',
                'email' => 'superuser@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secureSuperuserPass123'),
                'phone' => '1122334455',
                'address' => 'Superuser Address',
                'role' => 'superuser',
                'remember_token' => null,
            ],
            
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']], // Evita duplicados por correo
                $user
            );
        }
    }
}

    