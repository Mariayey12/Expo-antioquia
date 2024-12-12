<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        // Crear datos de administradores manualmente
        $admins = [
            [
                'permissions' => 'manage_users,view_reports',
                'department' => 'IT',
                'notes' => 'Administrador principal del sistema',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'permissions' => 'manage_reports,edit_content',
                'department' => 'Marketing',
                'notes' => 'Administrador de marketing y contenido',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'permissions' => 'manage_support,view_tickets',
                'department' => 'Customer Service',
                'notes' => 'Administrador de atención al cliente',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insertar administradores manualmente
        foreach ($admins as $adminData) {
            try {
                Admin::create($adminData);
            } catch (\Exception $e) {
                Log::error("Error al crear administrador: {$e->getMessage()}", $adminData);
            }
        }

        // Crear administradores adicionales con datos aleatorios usando Factory
        Admin::factory()->count(8)->create();

        echo "Administradores insertados exitosamente.\n";
    }
}
