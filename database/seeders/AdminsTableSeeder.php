<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        // Crear el primer administrador con usuario asociado
        $admin1 = Admin::create([
            'permissions' => 'manage_users,view_reports',
            'department' => 'IT',
            'notes' => 'Administrador del sistema principal',
        ]);

        User::create([
            'name' => 'Admin Principal',
            'email' => 'admin1@example.com',
            'password' => bcrypt('password123'), // Contraseña encriptada
            'userable_type' => Admin::class, // Relación polimórfica
            'userable_id' => $admin1->id, // ID dinámico
        ]);

        // Crear el segundo administrador con usuario asociado
        $admin2 = Admin::create([
            'permissions' => 'manage_admins,view_reports',
            'department' => 'Customer Service',
            'notes' => 'Administrador de servicios a clientes',
        ]);

        User::create([
            'name' => 'Admin de Clientes',
            'email' => 'admin2@example.com',
            'password' => bcrypt('password123'),
            'userable_type' => Admin::class,
            'userable_id' => $admin2->id,
        ]);

        // Crear más administradores con datos aleatorios y usuarios asociados
        $admins = Admin::factory()->count(8)->create();

        foreach ($admins as $admin) {
            User::create([
                'name' => 'Admin ' . $admin->id,
                'email' => 'admin' . $admin->id . '@example.com',
                'password' => bcrypt('password123'),
                'userable_type' => Admin::class,
                'userable_id' => $admin->id, // ID dinámico
            ]);
        }
          // Crear más administradores con datos aleatorios
          Admin::factory()->count(8)->create();
    }

}
