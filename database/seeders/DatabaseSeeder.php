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
        // Llama a cada seeder en el orden adecuado para evitar problemas de dependencias de claves foráneas.

        $this->call([
            AdminsTableSeeder::class,
            UserTableSeeder::class,            // Cargar Usuarios

        ]);
    }
}
