<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gastronomy;
use App\Models\Category;
use App\Models\Place;

class GastronomysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtén categorías y lugares existentes
        $categories = Category::whereIn('name', ['Restaurantes', 'Cafeterías', 'bares'])->get();
        $places = Place::all();

        // Crea gastronomías de ejemplo y establece relaciones
        foreach ($places as $place) {
            $gastronomy = Gastronomy::create([
                'name' => 'Restaurante ' . $place->name,
                'description' => 'Una experiencia gastronómica única en ' . $place->city,
                'address' => $place->address,
                'city' => $place->city,
                'contact_info' => json_encode([
                    'phone' => '+57 3001234567',
                    'email' => 'info@' . strtolower(str_replace(' ', '', $place->name)) . '.com',
                ]),
                'opening_hours' => 'Lunes a Domingo: 8:00 AM - 10:00 PM',
                'cost_range' => 'medium',
                'image_url' => 'https://via.placeholder.com/800x600',
                'video_url' => 'https://www.youtube.com/watch?v=example',
                'google_maps' => 'https://maps.google.com/?q=' . $place->latitude . ',' . $place->longitude,
                'specialties' => 'Platos típicos y cocina internacional.',
                'latitude' => $place->latitude,
                'longitude' => $place->longitude,
                'is_open' => true,
                'average_rating' => rand(3, 5), // Genera un promedio aleatorio
                'reviews_count' => rand(10, 100),
                'gastronomiceables_type' => Place::class,
                'gastronomiceables_id' => $place->id,
            ]);

            // Asocia categorías
            foreach ($categories as $category) {
                $gastronomy->categories()->attach($category);
            }
        }
        Gastronomy::factory(10)->create();
    }
}
