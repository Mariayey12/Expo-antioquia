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
        $admins = [
            [

                'permissions' => 'manage_users,view_reports',
                'department' => 'IT',
                'notes' => 'Administrador del sistema principal',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [

                'permissions' => 'manage_admins,view_reports',
                'department' => 'Customer Service',
                'notes' => 'Administrador del servicios a clientes',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insertar administradores relacionados con usuarios
        foreach ($admins as $adminData) {
            Admin::create([

                'permissions' => $adminData['permissions'],
                'department' => $adminData['department'],
                'notes' => $adminData['notes'],
                'created_at' => $adminData['created_at'],
                'updated_at' => $adminData['updated_at'],
            ]);
        }
    }
}
