<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User; // Importar el modelo User

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        // Crear administradores con factory
        $admin = Admin::factory()->create([
            'permissions' => 'manage_users,view_reports',
            'department' => 'IT',
            'notes' => 'Administrador del sistema principal',
        ]);

        Admin::factory()->create([
            'permissions' => 'manage_admins,view_reports',
            'department' => 'Customer Service',
            'notes' => 'Administrador de servicios a clientes',
        ]);

        // Crear más administradores con datos aleatorios
        Admin::factory()->count(8)->create(); // Puedes ajustar el número según necesites

        // Crear un usuario con datos específicos
        $user = User::factory()->create([
            'name' => 'Administrador de sistema',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Asociar el usuario con el administrador
        $user->userable()->associate($admin); // Asegúrate de que el tipo y ID sean correctos
        $user->save(); // Guardar el usuario con la relación asociada

        echo "Administradores y usuarios insertados exitosamente.\n";
    }
}
