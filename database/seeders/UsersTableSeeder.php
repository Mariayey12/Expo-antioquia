<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Crear administradores, proveedores y usuarios con factory
        $admin = Admin::factory()->create([
            'permissions' => 'manage_users,view_reports',
            'department' => 'IT',
            'notes' => 'Administrador del sistema principal',
        ]);

        $proveedor = Provider::factory()->create([
            'company_name' => 'Proveedor X',
            'contact_name' => 'Carlos Pérez',
            'phone' => '3001234567',
            'address' => 'Calle 123 #45-67, Bogotá',
            'email' => 'proveedorx@example.com',
        ]);

        $usuario = User::factory()->create([
            'name' => 'Usuario Básico',
            'email' => 'usuario@example.com',
            'password' => Hash::make('password123'),
            'phone' => '3107654321',
            'address' => 'Calle 789 #12-34, Medellín',
            'role' => 'usuario',
        ]);

        // Crear usuarios con relaciones polimórficas
        $users = [
            [
                'name' => 'Juan Pérez',
                'email' => 'juan@example.com',
                'password' => Hash::make('password123'),
                'phone' => '3001234567',
                'address' => 'Calle 123 #45-67, Medellín',
                'email_verified_at' => Carbon::now(),
                'profile_picture' => null,
                'role' => 'administrador',
                'remember_token' => Str::random(10),
                'userable_type' => 'App\Models\Admin', // Relación polimórfica con Admin
                'userable_id' => $admin->id, // ID dinámico del Admin
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Carlos García',
                'email' => 'carlos@example.com',
                'password' => Hash::make('password123'),
                'phone' => '3209876543',
                'address' => 'Avenida 1 #23-45, Cali',
                'email_verified_at' => Carbon::now(),
                'profile_picture' => null,
                'role' => 'proveedor',
                'remember_token' => Str::random(10),
                'userable_type' => 'App\Models\Provider', // Relación polimórfica con Provider
                'userable_id' => $proveedor->id, // ID dinámico del Proveedor
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Ana Torres',
                'email' => 'ana@example.com',
                'password' => Hash::make('password123'),
                'phone' => '3051237890',
                'address' => 'Diagonal 12 #34-56, Cartagena',
                'email_verified_at' => Carbon::now(),
                'profile_picture' => null,
                'role' => 'usuario',
                'remember_token' => Str::random(10),
                'userable_type' => 'App\Models\User', // Relación polimórfica con User
                'userable_id' => $usuario->id, // ID dinámico del Usuario
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];



        // Crear más administradores con datos aleatorios
        User::factory()->count(8)->create(); // Puedes ajustar el número según necesites

        echo "Usuarios insertados exitosamente.\n";
    }
}
