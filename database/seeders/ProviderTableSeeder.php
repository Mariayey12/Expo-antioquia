<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        // Crear 1 administrador con datos personalizados
        Admin::factory()->create([
            'permissions' => 'manage_users,view_reports',
            'department' => 'IT',
            'notes' => 'Administrador del sistema principal',
        ]);

        // Crear 1 administrador con datos personalizados
        Admin::factory()->create([
            'permissions' => 'manage_admins,view_reports',
            'department' => 'Customer Service',
            'notes' => 'Administrador de servicios a clientes',
        ]);
        // Relacionar el usuario con el proveedor mediante la relación polimórfica
        $user->userable()->associate($provider);
        $user->save();

        // Crear más administradores con datos aleatorios
        Admin::factory()->count(8)->create(); // Puedes ajustar el número según necesites
    }
}



