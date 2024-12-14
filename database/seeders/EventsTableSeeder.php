<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Category;
use App\Models\Place;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    public function run()
    {
        // Crear categorías de ejemplo
        $categories = Category::factory()->count(5)->create(); // Crea 5 categorías
        $places = Place::factory()->count(10)->create(); // Crea 10 lugares

        // Crear eventos y asociarlos a categorías y lugares
        Event::factory()->count(50)->create()->each(function ($event) use ($categories, $places) {
            // Asocia una categoría aleatoria al evento
            $event->category()->associate($categories->random());

            // Asocia un lugar aleatorio al evento
            $event->place()->associate($places->random());

            // Guarda el evento con las relaciones
            $event->save();
        });
    }
}
