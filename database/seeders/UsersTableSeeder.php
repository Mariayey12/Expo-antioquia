<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Definimos los usuarios en un arreglo
        $users = [
            [
                'name' => 'Juan Pérez',
                'email' => 'juan@example.com',
                'password' => Hash::make('password123'),
                'phone' => '3001234567',
                'address' => 'Calle 123 #45-67, Medellín',
                'email_verified_at' => Carbon::now(),
                'profile_picture' => null, // Puede ser nulo
                'role' => 'administrador', // Rol del usuario
                'remember_token' => Str::random(10),
                'userable_type' => 'App\Models\Admin', // Definimos el tipo de modelo relacionado
                'userable_id' => 1, // Usamos el ID del modelo relacionado (puede ser cualquier ID válido de Admin)
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'María López',
                'email' => 'maria@example.com',
                'password' => Hash::make('password123'),
                'phone' => '3107654321',
                'address' => 'Carrera 7 #89-10, Bogotá',
                'email_verified_at' => Carbon::now(),
                'profile_picture' => null, // Puede ser nulo
                'role' => 'usuario', // Rol del usuario
                'remember_token' => Str::random(10),
                'userable_type' => 'App\Models\User', // Definimos el tipo de modelo relacionado
                'userable_id' => 2, // Usamos el ID del modelo relacionado (puede ser cualquier ID válido de Usuario)
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
                'profile_picture' => null, // Puede ser nulo
                'role' => 'proveedor', // Rol del usuario
                'remember_token' => Str::random(10),
                'userable_type' => 'App\Models\Proveedor', // Definimos el tipo de modelo relacionado
                'userable_id' => 3, // Usamos el ID del modelo relacionado (puede ser cualquier ID válido de Proveedor)
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
                'profile_picture' => null, // Puede ser nulo
                'role' => 'usuario', // Rol del usuario
                'remember_token' => Str::random(10),
                'userable_type' => 'App\Models\User', // Definimos el tipo de modelo relacionado
                'userable_id' => 4, // Usamos el ID del modelo relacionado (puede ser cualquier ID válido de Usuario)
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Luis Ramírez',
                'email' => 'luis@example.com',
                'password' => Hash::make('password123'),
                'phone' => '3154567890',
                'address' => 'Transversal 45 #67-89, Barranquilla',
                'email_verified_at' => Carbon::now(),
                'profile_picture' => null, // Puede ser nulo
                'role' => 'proveedor', // Rol del usuario
                'remember_token' => Str::random(10),
                'userable_type' => 'App\Models\Proveedor', // Definimos el tipo de modelo relacionado
                'userable_id' => 5, // Usamos el ID del modelo relacionado (puede ser cualquier ID válido de Proveedor)
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insertar los usuarios en la base de datos
        DB::table('users')->insert($users);

        echo "Usuarios insertados exitosamente.\n";
    }
}
