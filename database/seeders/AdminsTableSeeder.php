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
        // Administradores a insertar

         // Crear administradores con factory
         Admin::factory()->create([
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
        $user->userable()->associate($admins);
        $user->save();
        }
    }



