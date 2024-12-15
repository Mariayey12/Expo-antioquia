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
        // Verifica que existan categorías con los nombres especificados
        $categories = Category::whereIn('name', ['Restaurantes', 'Cafeterías', 'bares'])->get();

        if ($categories->isEmpty()) {
            $this->command->info('No se encontraron categorías con los nombres especificados.');
        } else {
            $this->command->info('Categorías encontradas: ' . $categories->pluck('name')->implode(', '));
        }

        // Verifica que existan lugares
        $places = Place::all();

        if ($places->isEmpty()) {
            $this->command->info('No se encontraron lugares para asociar con gastronomías.');
        } else {
            $this->command->info('Lugares encontrados: ' . $places->pluck('name')->implode(', '));
        }

        // Crea gastronomías de ejemplo y establece relaciones
        foreach ($places as $place) {
            // Verifica si el lugar tiene las coordenadas necesarias
            if (empty($place->latitude) || empty($place->longitude)) {
                $this->command->info("El lugar {$place->name} no tiene coordenadas para asociarse correctamente.");
                continue;
            }

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
                'average_rating' => rand(3, 5),
                'reviews_count' => rand(10, 100),
                'gastronomiceables_type' => Place::class,
                'gastronomiceables_id' => $place->id,
            ]);

            // Asocia las categorías solo si existen
            foreach ($categories as $category) {
                // Verifica si la categoría ya existe
                if (Category::find($category->id)) {
                    $gastronomy->categories()->attach($category);
                    $this->command->info("Categoría '{$category->name}' asociada a la gastronomía '{$gastronomy->name}' exitosamente.");
                } else {
                    $this->command->info("La categoría '{$category->name}' no se encontró, no se asoció.");
                }
            }

            $this->command->info("Gastronomía '{$gastronomy->name}' insertada exitosamente.");
        }

        // Crear 10 entradas adicionales con la fábrica
        Gastronomy::factory(10)->create();
        $this->command->info("Gastronomías insertadas exitosamente.");
    }
}
