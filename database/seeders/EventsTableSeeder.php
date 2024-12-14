<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Category;
use App\Models\Place;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtén categorías existentes
        $categories = Category::whereIn('name', ['Concierto', 'Festival', 'Feria'])->get();

        // Obtén lugares existentes
        $places = Place::all();

        // Crea eventos de ejemplo y establece relaciones
        foreach ($places as $place) {
            $event = Event::create([
                'name' => 'Evento en ' . $place->name,
                'description' => 'Un evento único en ' . $place->city,
                'type' => $categories->random()->name, // Asigna una categoría aleatoria
                'start_date' => now()->addDays(rand(1, 30)),
                'end_date' => now()->addDays(rand(31, 60)),
                'location' => $place->address,
                'organizer_name' => 'Organización ' . $place->name,
                'contact_info' => json_encode([
                    'phone' => '+57 300' . rand(1000000, 9999999),
                    'email' => 'contacto@' . strtolower(str_replace(' ', '', $place->name)) . '.com',
                ]),
                'image_url' => 'https://via.placeholder.com/800x600',
                'video_url' => 'https://www.youtube.com/watch?v=example',
                'google_maps' => 'https://maps.google.com/?q=' . $place->latitude . ',' . $place->longitude,
                'latitude' => $place->latitude,
                'longitude' => $place->longitude,
                'is_virtual' => rand(0, 1), // Aleatoriamente define si el evento es virtual
                'price' => rand(0, 200000), // Genera un precio aleatorio
            ]);

            // Asocia una categoría aleatoria al evento
            $event->categories()->attach($categories->random());

            // Asocia el evento al lugar (relación polimórfica)
            $event->eventable()->associate($place);
            $event->save();
        }

        // Crear eventos adicionales usando factories
        Event::factory(10)->create();
    }
}
