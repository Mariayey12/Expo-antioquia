<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;
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
                'name' => 'Admin Principal',
                'email' => 'admin1@example.com',
                'password' => bcrypt('password123'),
            ],
            [
                'permissions' => 'manage_reports,edit_content',
                'department' => 'Marketing',
                'notes' => 'Administrador de marketing y contenido',
                'name' => 'Admin Marketing',
                'email' => 'admin2@example.com',
                'password' => bcrypt('password123'),
            ],
            [
                'permissions' => 'manage_support,view_tickets',
                'department' => 'Customer Service',
                'notes' => 'Administrador de atención al cliente',
                'name' => 'Admin Soporte',
                'email' => 'admin3@example.com',
                'password' => bcrypt('password123'),
            ],
        ];

        foreach ($admins as $adminData) {
            try {
                // Crear registro en Admin
                $admin = Admin::create([
                    'permissions' => $adminData['permissions'],
                    'department' => $adminData['department'],
                    'notes' => $adminData['notes'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                // Crear registro en Users vinculado al Admin
                User::firstOrCreate(
                    ['email' => $adminData['email']], // Evitar duplicados
                    [
                        'name' => $adminData['name'],
                        'password' => $adminData['password'],
                        'userable_id' => $admin->id,
                        'userable_type' => Admin::class,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                );
            } catch (\Exception $e) {
                Log::error("Error al crear administrador: {$e->getMessage()}");
            }
        }

        // Crear administradores adicionales con datos aleatorios usando Factory
        Admin::factory()->count(8)->create()->each(function ($admin) {
            User::create([
                'name' => 'Admin Aleatorio',
                'email' => fake()->unique()->safeEmail,
                'password' => bcrypt('password123'),
                'userable_id' => $admin->id,
                'userable_type' => Admin::class,
            ]);
        });
        $this->command->info('Administradores insertados exitosamente.\n');
    }
}

