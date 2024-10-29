<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'phone' => '8969666666',
                'address' => '254 33',
                'role' => 'user', // Asegúrate de incluir este campo
                'remember_token' => Str::random(10), // Genera un token aleatorio
            ],
            [
                'name' => 'Administrador',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secureAdminPass123'),
                'phone' => '1234567890',
                'address' => 'Admin Address',
                'role' => 'admin',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Usuario Normal',
                'email' => 'user@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secureUserPass123'),
                'phone' => '0987654321',
                'address' => 'User Address',
                'role' => 'user',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Superusuario',
                'email' => 'superuser@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secureSuperuserPass123'),
                'phone' => '1122334455',
                'address' => 'Superuser Address',
                'role' => 'superuser',
                'remember_token' => Str::random(10),
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }
}
