<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
<<<<<<< HEAD
     */
    public function run(): void
    {
        // Llama a cada seeder en el orden adecuado para evitar problemas de dependencias de claves foráneas.

        $this->call([
            AdminsTableSeeder::class,
            UserTableSeeder::class,            // Cargar Usuarios

=======
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
>>>>>>> 4a670564dbc1255949373c17bdc87cdc0df3f020
        ]);
    }
}
