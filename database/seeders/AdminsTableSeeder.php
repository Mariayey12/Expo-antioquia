<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        // Datos para la tabla 'admins'
        $admins = [
            [
                'permissions' => 'manage_users,view_reports',
                'department' => 'IT',
                'notes' => 'Administrador del sistema principal',
            ],
            [
                'permissions' => 'manage_services,view_statistics',
                'department' => 'Customer Support',
                'notes' => 'Responsable de soporte al cliente',
            ],
        ];

        foreach ($admins as $key => $adminData) {
            // Crear un registro en la tabla 'admins'
            $admin = Admin::create($adminData);

            // Crear un usuario para el administrador
            $user = User::create([
                'name' => 'Admin ' . ($key + 1), // Nombre dinámico para el usuario
                'email' => 'admin' . ($key + 1) . '@example.com',
                'password' => Hash::make('password123'),
                'phone' => '300000000' . ($key + 1),
                'address' => 'Calle Principal #' . ($key + 1) . ' Medellín',
                'email_verified_at' => Carbon::now(),
                'profile_picture' => null, // Puede ser nulo
                'role' => 'administrador', // Rol del usuario
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Establecer los valores de la relación polimórfica
            $user->userable_type = Admin::class;  // Corregido: Usar el nombre de clase correcto 'Admin'
            $user->userable_id = $admin->id;     // Establecer el ID del administrador
            $user->save();  // Guardar los cambios en la tabla 'users'
        }

        echo "Administradores y usuarios asociados insertados exitosamente.\n";
    }
}
