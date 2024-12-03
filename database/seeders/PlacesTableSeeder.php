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

                        $categories = Category::all(); // Obtener todas las categorías

                        // Asignar categorías a los lugares, servicios y comercios
                        $places = Place::all();
                        $services = Service::all();
                        $commerces = Commerce::all();

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
                    // Crear 10 lugares aleatorios y asociarles categorías y servicios
        $places = Place::factory(10)->create();

        // Crear lugares
        $places = [
            [
                'name' => 'Hotel Cartagena Beach',
                'description' => 'Hotel frente a la playa con vistas al mar Caribe.',
                'location' => 'Cartagena',
                'image_url' => 'https://example.com/cartagenabeach.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example2',
                'google_maps' => 'https://www.google.com/maps/place/Hotel+Cartagena+Beach',
                'latitude' => 10.391,
                'longitude' => -75.477,
                'services' => json_encode(['playa', 'piscina', 'restaurante', 'spa']),
                'price_per_night' => 300,
                'phone_number' => '0575678901',
                'email' => 'info@cartagenabeach.com',
                'website' => 'https://www.cartagenabeach.com',
                'capacity' => 200,
                'rating' => 4.8,
                'address' => 'Calle del Mar # 123',
                'city' => 'Cartagena',
                'average_price' => 250, // Definido como no nulo
                'opening_time' => '08:00:00',
                'closing_time' => '22:00:00',
                'price_range' => 'Alto',
                'contact_number' => '0575678901',
                'rating' => 4.8,
                'website' => 'https://www.cartagenabeach.com',
                'capacity' => 200,
                'menu' => json_encode(['pescado frito', 'ceviche', 'arroz con coco']),
                'date' => now(),
                'event_date' => now()->addDays(30),
                'activities' => json_encode(['yoga en la playa', 'paseos en bote']),
                'duration_days' => 3,
                'artists' => 'Carlos Vives, Shakira',
                'artist' => 'Carlos Vives',
                'provider_name' => 'Cartagena Beach Resort',
                'contact_info' => 'contact@cartagenabeach.com',
                'material' => 'Lino, madera',
                'technique' => 'Artesanía tradicional',
                'price' => 300.00,
                'cost' => 150.00,
                'services' => json_encode(['spa', 'piscina', 'restaurante']),
                'duration' => '2 horas',
                'is_active' => true,
                'opening_days' => json_encode(['lunes', 'martes', 'miércoles', 'jueves', 'viernes']),
                'is_featured' => true,
                'has_parking' => true,
                'is_renovated' => false,
                'last_renovation_date' => now(),
                'price_range_category' => 'Alto',
                'reviews_count' => 120,
                'categorizable_type' => 'hotel',
                'categorizable_id' => 1, // Asocia el hotel con una categoría
                'placeable_type' => 'App\Models\Category',
                'placeable_id' => 1, // Asocia el hotel con otro tipo de lugar si es necesario
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hotel Intercontinental Medellín',
                'description' => 'Hotel lujoso con vistas panorámicas de la ciudad.',
                'location' => 'Antioquia',
                'image_url' => 'https://www.intercontinental.com/images/hotel1.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example',
                'google_maps' => 'https://www.google.com/maps/place/Hotel+Intercontinental',
                'latitude' => 6.25,
                'longitude' => -75.574,
                'services' => json_encode(['piscina', 'gimnasio', 'spa']),
                'price_per_night' => 200,
                'phone_number' => '0345678901',
                'email' => 'info@intercontinental.com',
                'website' => 'https://www.intercontinental.com',
                'capacity' => 150,
                'rating' => 5,
                'address' => 'Calle 1 # 2-3',
                'city' => 'Medellín',
                'average_price' => 250, // Definido como no nulo
                'status' => 't', // Asumiendo que 't' significa activo
                'is_active' => true, // Asumiendo que el valor booleano representa si está activo
                'is_deleted' => false, // Suposición sobre el campo para manejar eliminación lógica
                'placeable_type' => 'App\Models\Category',
                'placeable_id' => 2, // Asocia el hotel con otro tipo de lugar si es necesario
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        foreach ($places as $placeData) {
            // Validar que los campos no sean nulos
            foreach ($place as $key => $value) {
                if (is_null($value)) {
                    throw new \Exception("El campo '{$key}' no puede ser nulo en el lugar '{$place['name']}'");
                }
            }
            $place = Place::create($placeData);
            // Asociar categorías al lugar
            $category = Category::where('name', 'hotel')->first(); // Asegúrate de que la categoría exista
            if ($category) {
                $place->categories()->attach($category->id);
            }



                    }
                }}



