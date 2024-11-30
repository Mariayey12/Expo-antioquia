<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
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
            // Agrega más administradores si es necesario
        ];

        // Insertar en la tabla 'users' primero
        foreach ($admins as $admin) {
            $user = User::create([
                'name' => $admin['name'],
                'email' => $admin['email'],
                'password' => $admin['password'],
                'phone' => $admin['phone'],
                'address' => $admin['address'],
                'role' => $admin['role'],
                'created_at' => $admin['created_at'],
                'updated_at' => $admin['updated_at'],
            ]);

            // Insertar el administrador asociado en la tabla 'admins'
            Admin::create([
                'user_id' => $user->id,
                'permissions' => 'all', // Puedes ajustar los permisos como desees
                'department' => 'General', // Ajustar según el departamento del admin
                'notes' => 'Administrador de alto nivel',
            ]);
        }
    }
}
