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
        // Crear categorías iniciales con nombre y descripción
        $categories = [
            ['name' => 'Comercio', 'description' => 'Espacios dedicados a la venta de bienes y servicios.'],
            ['name' => 'Productos', 'description' => 'Artículos disponibles para compra o venta.'],
            ['name' => 'Transporte', 'description' => 'Servicios de movilidad para personas y bienes.'],
            ['name' => 'Relajación', 'description' => 'Lugares para descansar y recargar energías.'],
            ['name' => 'Bienestar', 'description' => 'Espacios enfocados en la salud física y mental.'],
            ['name' => 'Salud', 'description' => 'Servicios relacionados con el cuidado médico.'],
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
                'placeable_type' => 'hotel',
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
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($places as $placeData) {
            // Validación para asegurarse de que los campos no sean nulos
            foreach ($placeData as $key => $value) {
                if (is_null($value)) {
                    throw new \Exception("El campo '{$key}' no puede ser nulo en el lugar '{$placeData['name']}'");
                }
            }

            $place = Place::create($placeData);

            // Asociar categorías al lugar
            $category = Category::where('name', 'hotel')->first();
            if ($category) {
                $place->categories()->attach($category->id);
            }

            // Crear servicios relacionados con el lugar
            $services = [
                [
                    'name' => 'Transporte Medellín',
                    'description' => 'Servicio de transporte privado.',
                    'image_url' => 'https://www.transporte.com/images/service1.jpg',
                    'cost' => 10000.00,
                    'duration' => '1 hora',
                    'contact_info' => 'info@transporte.com',
                    'serviceable_type' => Place::class,
                    'serviceable_id' => $place->id,
                ],
                [
                    'name' => 'Masajes Relajantes',
                    'description' => 'Servicio de masajes en Spa Relax.',
                    'image_url' => 'https://www.sparelax.com/images/service2.jpg',
                    'cost' => 50000.00,
                    'duration' => '2 horas',
                    'contact_info' => 'relax@spa.com',
                    'serviceable_type' => Place::class,
                    'serviceable_id' => $place->id,
                ],
            ];

            foreach ($services as $serviceData) {
                // Validar campos no nulos en los servicios
                foreach ($serviceData as $key => $value) {
                    if (is_null($value)) {
                        throw new \Exception("El campo '{$key}' no puede ser nulo en el servicio '{$serviceData['name']}'");
                    }
                }

                Service::create($serviceData);
            }
        }

        // Crear comercios
        $commerces = [
            [
                'name' => 'Tienda de Artesanías',
                'description' => 'Venta de artesanías locales y souvenirs.',
                'location' => 'Rionegro',
                'image_url' => 'https://www.artesanias.com/images/commerce1.jpg',
                'google_maps' => 'https://www.google.com/maps/place/Tienda+de+Artesanías',
            ],
            [
                'name' => 'Cafetería Antioqueña',
                'description' => 'Cafetería con productos típicos de Antioquia.',
                'location' => 'Medellín',
                'image_url' => 'https://www.cafeteriaantioquena.com/images/commerce2.jpg',
                'google_maps' => 'https://www.google.com/maps/place/Cafetería+Antioqueña',
            ],
        ];

        foreach ($commerces as $commerceData) {
            // Validación para evitar campos nulos
            foreach ($commerceData as $key => $value) {
                if (is_null($value)) {
                    throw new \Exception("El campo '{$key}' no puede ser nulo en el comercio '{$commerceData['name']}'");
                }
            }

            Commerce::create($commerceData);
        }
    }
}