<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        // Datos de administradores a insertar
        $admins = [
            [
                'name' => 'Admin 1',
                'email' => 'admin1@example.com',
                'password' => bcrypt('password123'),
                'phone' => '3000000001',
                'address' => 'Calle Principal #1 Medellín',
                'role' => 'administrador',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Admin 2',
                'email' => 'admin2@example.com',
                'password' => bcrypt('password123'),
                'phone' => '3000000002',
                'address' => 'Calle Secundaria #2 Medellín',
                'role' => 'administrador',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insertar usuarios
        foreach ($admins as $adminData) {
            $user = User::create([
                'name' => $adminData['name'],
                'email' => $adminData['email'],
                'password' => $adminData['password'],
                'phone' => $adminData['phone'],
                'address' => $adminData['address'],
                'role' => $adminData['role'],
                'created_at' => $adminData['created_at'],
                'updated_at' => $adminData['updated_at'],
            ]);

            // Crear un administrador relacionado con el usuario
            $user->admin()->create([
                'permissions' => 'all', // Valor predeterminado
                'department' => 'General', // Valor predeterminado
                'notes' => 'Administrador de alto nivel',
            ]);
        }
    }
}
