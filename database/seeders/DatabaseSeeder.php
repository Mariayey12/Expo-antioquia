<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Llama a los seeders de las tablas específicas en el orden adecuado
        $this->call([
            AdminsTableSeeder::class,         // Seeder para administradores
            UsersTableSeeder::class,         // Seeder para usuarios
            ProviderTableSeeder::class,      // Seeder para proveedores (o servicios, etc.)
            PlacesTableSeeder::class,        // Seeder para lugares
            // Otros seeders que puedas tener
        ]);
    }
}
