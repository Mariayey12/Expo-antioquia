<?php

    namespace Database\Seeders;

        use Illuminate\Database\Seeder;
        use App\Models\Place;
        use App\Models\Category;
        use App\Models\Service;
        use App\Models\Commerce;

        class PlacesTableSeeder extends Seeder
        {
            /**
             * Run the database seeds.
             *
             * @return void
             */
                public function run(): void
                {
                    // Crear 10 categorías aleatorias
                    Category::factory(10)->create();
                    // Crear categorías iniciales con nombre y descripción

            $categories = [
                ['name' => 'Comercio', 'description' => 'Espacios dedicados a la venta de bienes y servicios.'],
                ['name' => 'Productos', 'description' => 'Artículos disponibles para compra o venta.'],
                ['name' => 'Transporte', 'description' => 'Servicios de movilidad para personas y bienes.'],
                ['name' => 'Relajación', 'description' => 'Lugares para descansar y recargar energías.'],
                ['name' => 'Bienestar', 'description' => 'Espacios enfocados en la salud física y mental.'],
                ['name' => 'Salud', 'description' => 'Servicios relacionados con el cuidado médico.'],
                ['name' => 'Hoteles', 'description' => 'Establecimientos que ofrecen alojamiento temporal y servicios complementarios.'],
                ['name' => 'Sitios Turísticos', 'description' => 'Lugares de interés cultural, histórico y natural para el disfrute de los turistas.'],
                ['name' => 'Sitios de Relajación', 'description' => 'Espacios dedicados a la tranquilidad, descanso y desconexión del estrés.'],
                ['name' => 'Spa', 'description' => 'Centros de bienestar que ofrecen tratamientos de relajación y cuidado personal.'],
                ['name' => 'Museos', 'description' => 'Espacios dedicados a la conservación y exhibición de colecciones artísticas, históricas y científicas.'],
            ];


                    foreach ($categories as $categoryData) {
                        // Validar que los campos no sean nulos
                        foreach ($categoryData as $key => $value) {
                            if (is_null($value)) {
                                throw new \Exception("El campo '{$key}' no puede ser nulo en la categoría '{$categoryData['name']}'");
                            }
                        }

                        // Crear categoría si no existe
                        Category::firstOrCreate($categoryData);
                    }


                }
            }



