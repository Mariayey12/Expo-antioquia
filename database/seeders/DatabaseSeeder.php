<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llama a los seeders de las tablas específicas en el orden adecuado
        $this->call([
            AdminsTableSeeder::class,          // Seeder para administradores
            ProviderTableSeeder::class,
            UsersTableSeeder::class,           // Seeder para usuarios
            PlacesTableSeeder::class,          // Seeder para lugares

        ]);
    }
}
