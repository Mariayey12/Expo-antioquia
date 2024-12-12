<?php

namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use App\Models\Admin;
    use App\Models\User;

    class AdminsTableSeeder extends Seeder
    {
        public function run()
        {
            // Crear administradores con datos específicos y usuarios asociados
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
                'userable_id' => 10, // ID del administrador creado
            ]);

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
                'userable_id' => 11,
            ]);

            // Crear más administradores con datos aleatorios
            $admins = Admin::factory()->count(8)->create();

            foreach ($admins as $admin) {
                // Asociar un usuario a cada administrador creado
                User::create([
                    'name' => 'Admin ' . $admin->id,
                    'email' => 'admin' . $admin->id . '@example.com',
                    'password' => bcrypt('password123'),
                    'userable_type' => Admin::class,
                    'userable_id' => 12,
                ]);
                // Crear más administradores con datos aleatorios
        Admin::factory()->count(8)->create(); // Puedes ajustar el número según necesites
            }
        }
    }
