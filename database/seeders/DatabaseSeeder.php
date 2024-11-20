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
        // Llama a los seeders de las tablas específicas
        $this->call([
            AdsTableSeeder::class,
            PlacesTableSeeder::class,
            HotelsTableSeeder::class,
            RestaurantsTableSeeder::class,
            TouristPlacesTableSeeder::class,
            RelaxationPlacesTableSeeder::class,
            CommentsTableSeeder::class,
            UsersTableSeeder::class,
            ReservationsTableSeeder::class,
        ]);
    }
}
