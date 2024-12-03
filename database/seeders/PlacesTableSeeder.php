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
                        //$services = Service::all();
                        //$commerces = Commerce::all();

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
        $placesData = Place::factory(10)->create();

        // Crear lugares
        $placesData = [
            [
                'name' => 'Hotel Intercontinental Medellín',
                'description' => 'Hotel lujoso con vistas panorámicas de la ciudad.',
                'location' => 'Antioquia',
                'image_url' => 'https://www.intercontinental.com/images/hotel1.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example',
                'google_maps' => 'https://www.google.com/maps/place/Hotel+Intercontinental',
                'average_price' => 250.00,
                'opening_time' => '14:00:00',
                'closing_time' => '12:00:00',
                'price_range' => 'Alta',
                'contact_number' => '0345678901',
                'email' => 'info@intercontinental.com',
                'address' => 'Calle 1 # 2-3',
                'city' => 'Medellín',
                'price_per_night' => 200,
                'phone_number' => '0345678901',
                'rating' => 4.5,
                'website' => 'https://www.intercontinental.com',
                'capacity' => 150,
                'menu' => json_encode(['desayuno', 'almuerzo', 'cena']),
                'date' => now(),
                'event_date' => now(),
                'activities' => json_encode(['spa', 'gimnasio', 'piscina']),
                'duration_days' => 3,
                'artists' => 'Carlos Vives',
                'latitude' => 6.25,
                'longitude' => -75.574,
                'provider_name' => 'Proveedor Intercontinental',
                'contact_info' => 'contacto@intercontinental.com',
                'material' => 'Lujoso',
                'technique' => 'Arquitectura moderna',
                'price' => 500.00,
                'cost' => 300.00,
                'services' => 'Gimnasio, SPA, Piscina',
                'duration' => '1 hora',
                'is_active' => true,
                'opening_days' => json_encode(['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes']),
                'is_featured' => true,
                'has_parking' => true,
                'is_renovated' => false,
                'last_renovation_date' => null,
                'price_range_category' => 'Alta',
                'reviews_count' => 200,
                'categorizable_type' => 'App\Models\Category',
                'categorizable_id' => 1, // Ejemplo de categoría
                'placeable_type' => 'App\Models\Category',
                'placeable_id' => 2, // Ejemplo de tipo de lugar
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Segundo hotel
            [
                'name' => 'Hotel Hilton Medellín',
                'description' => 'Hotel de lujo con excelentes instalaciones y servicios.',
                'location' => 'Antioquia',
                'image_url' => 'https://www.hilton.com/images/hotel2.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=example',
                'google_maps' => 'https://www.google.com/maps/place/Hotel+Hilton',
                'average_price' => 300.00,
                'opening_time' => '15:00:00',
                'closing_time' => '12:00:00',
                'price_range' => 'Alta',
                'contact_number' => '0345678902',
                'email' => 'info@hilton.com',
                'address' => 'Calle 5 # 6-8',
                'city' => 'Medellín',
                'price_per_night' => 250,
                'phone_number' => '0345678902',
                'rating' => 4.7,
                'website' => 'https://www.hilton.com',
                'capacity' => 200,
                'menu' => json_encode(['desayuno buffet', 'almuerzo gourmet', 'cena internacional']),
                'date' => now(),
                'event_date' => now(),
                'activities' => json_encode(['conciertos', 'piscina', 'yoga']),
                'duration_days' => 4,
                'artists' => 'Shakira',
                'latitude' => 6.35,
                'longitude' => -75.580,
                'provider_name' => 'Proveedor Hilton',
                'contact_info' => 'contacto@hilton.com',
                'material' => 'Exclusivo',
                'technique' => 'Arquitectura moderna y sostenible',
                'price' => 600.00,
                'cost' => 350.00,
                'services' => 'Conciertos, Yoga, SPA, Restaurante',
                'duration' => '2 horas',
                'is_active' => true,
                'opening_days' => json_encode(['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes']),
                'is_featured' => true,
                'has_parking' => true,
                'is_renovated' => true,
                'last_renovation_date' => now(),
                'price_range_category' => 'Alta',
                'reviews_count' => 250,
                'categorizable_type' => 'App\Models\Category',
                'categorizable_id' => 1, // Ejemplo de categoría
                'placeable_type' => 'App\Models\Category',
                'placeable_id' => 2, // Ejemplo de tipo de lugar
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        foreach ($placesData as $placeData) {
            // Validar que los campos no sean nulos
            foreach ($placeData as $key => $value) {
                if (is_null($value)) {
                    throw new \Exception("El campo '{$key}' no puede ser nulo en el lugar '{$placeData['name']}'");
                }
            }

            // Crear el lugar
            $places = Place::create($placeData);

            // Asociar categorías a los lugares utilizando la relación polimórfica
            $category = Category::where('name', 'Hoteles')->first(); // Asegúrate de que la categoría exista
            if ($category) {
                // Asociar categoría al lugar
                $places->categories()->attach($category->id);
            }
        }
    }
}


