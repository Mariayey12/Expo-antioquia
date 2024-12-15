<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Place;
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

        // Obtén modelos de lugares existentes
        $places = Place::all();

        // Verifica que haya lugares disponibles
        if ($places->isEmpty()) {
            $this->command->warn('No se encontraron lugares. Asegúrate de llenar la tabla de lugares antes de ejecutar el seeder.');
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

        // Crear eventos adicionales usando factories (si es necesario)
        Event::factory(10)->create();
    }
}


