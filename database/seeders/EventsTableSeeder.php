<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Place;
use App\Models\Service;
use App\Models\Commerce;
use App\Models\Category;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtén categorías existentes
        $categories = Category::whereIn('name', ['Concierto', 'Festival', 'Feria'])->get();

        if ($categories->isEmpty()) {
            $this->command->warn('No se encontraron categorías. Asegúrate de ejecutar el CategoriesTableSeeder.');
            return;
        }

        // Obtén modelos polimórficos existentes
        $places = Place::all();
        $services = Service::all();
        $commerce = Commerce::all();

        // Verifica que haya datos disponibles
        if ($places->isEmpty() && $services->isEmpty() && $commerce->isEmpty()) {
            $this->command->warn('No se encontraron lugares, servicios o comercios. Asegúrate de llenar estas tablas antes de ejecutar el seeder.');
            return;
        }

        // Crear eventos relacionados con lugares
        foreach ($places as $place) {
            $event = Event::create([
                'name' => 'Evento en ' . $place->name,
                'description' => 'Un evento único en ' . $place->city . '.',
                'type' => $categories->random()->name,
                'start_date' => now()->addDays(rand(1, 30)),
                'end_date' => now()->addDays(rand(31, 60)),
                'location' => $place->address,
                'cost' => rand(0, 500) ?: null,
                'organizer_name' => 'Organización ' . $place->name,
                'contact_info' => json_encode([
                    'phone' => '+57 300' . rand(1000000, 9999999),
                    'email' => 'contacto@' . strtolower(str_replace(' ', '', $place->name)) . '.com',
                ]),
                'image_url' => 'https://via.placeholder.com/800x600',
                'video_url' => 'https://www.youtube.com/watch?v=example',
                'google_maps' => 'https://maps.google.com/?q=' . $place->latitude . ',' . $place->longitude,
                'is_active' => true,
                'average_rating' => rand(3, 5),
                'reviews_count' => rand(10, 100),
                'eventable_type' => Place::class,
                'eventable_id' => $place->id,
            ]);

            // Asocia una categoría
            $event->categories()->attach($categories->random());
        }

        // Crear eventos relacionados con servicios
        foreach ($services as $service) {
            $event = Event::create([
                'name' => 'Evento de Servicio ' . $service->name,
                'description' => 'Un evento relacionado con el servicio ' . $service->name,
                'type' => $categories->random()->name,
                'start_date' => now()->addDays(rand(10, 40)),
                'end_date' => now()->addDays(rand(41, 70)),
                'location' => $service->address,
                'cost' => rand(0, 300),
                'organizer_name' => 'Organización ' . $service->name,
                'contact_info' => json_encode([
                    'phone' => '+57 320' . rand(1000000, 9999999),
                    'email' => 'info@' . strtolower(str_replace(' ', '', $service->name)) . '.com',
                ]),
                'image_url' => 'https://via.placeholder.com/800x600',
                'video_url' => 'https://www.youtube.com/watch?v=example2',
                'google_maps' => 'https://maps.google.com/?q=' . $service->latitude . ',' . $service->longitude,
                'is_active' => true,
                'average_rating' => rand(3, 5),
                'reviews_count' => rand(5, 50),
                'eventable_type' => Service::class,
                'eventable_id' => $service->id,
            ]);

            // Asocia una categoría
            $event->categories()->attach($categories->random());
        }

        // Crear eventos relacionados con comercios
        foreach ($commerce as $shop) {
            $event = Event::create([
                'name' => 'Evento Comercial ' . $shop->name,
                'description' => 'Un evento único en ' . $shop->city . '.',
                'type' => $categories->random()->name,
                'start_date' => now()->addDays(rand(5, 25)),
                'end_date' => now()->addDays(rand(26, 50)),
                'location' => $shop->address,
                'cost' => rand(0, 200),
                'organizer_name' => 'Comercio ' . $shop->name,
                'contact_info' => json_encode([
                    'phone' => '+57 350' . rand(1000000, 9999999),
                    'email' => 'contacto@' . strtolower(str_replace(' ', '', $shop->name)) . '.com',
                ]),
                'image_url' => 'https://via.placeholder.com/800x600',
                'video_url' => 'https://www.youtube.com/watch?v=example3',
                'google_maps' => 'https://maps.google.com/?q=' . $shop->latitude . ',' . $shop->longitude,
                'is_active' => true,
                'average_rating' => rand(4, 5),
                'reviews_count' => rand(20, 70),
                'eventable_type' => Commerce::class,
                'eventable_id' => $shop->id,
            ]);

            // Asocia una categoría
            $event->categories()->attach($categories->random());
        }

        // Crear eventos adicionales usando factories
        Event::factory(10)->create();
    }
}

