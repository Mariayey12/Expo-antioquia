<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\Proveedor;
use App\Models\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Crear administradores, proveedores y usuarios de forma dinámica
        $admin = Admin::factory()->create();
        $proveedor = Proveedor::factory()->create();
        $usuario = User::factory()->create();

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
                'userable_type' => 'App\Models\Admin',
                'userable_id' => $admin->id, // Usamos el ID dinámico del Admin
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
                'userable_type' => 'App\Models\Proveedor',
                'userable_id' => $proveedor->id, // Usamos el ID dinámico del Proveedor
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
                'userable_type' => 'App\Models\User',
                'userable_id' => $usuario->id, // Usamos el ID dinámico de Usuario
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insertar los usuarios en la base de datos
        DB::table('users')->insert($users);

        echo "Usuarios insertados exitosamente.\n";
    }
}
