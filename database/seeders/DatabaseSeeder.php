<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Llamar a los seeders que deseas ejecutar
        $this->call([
            PlaceSeeder::class,
              // Llama al seeder de AdsTableSeeder
            AdsTableSeeder::class,
             // Llama al seeder de Users
           UsersTableSeeder::class,
        ]);
    }
}
