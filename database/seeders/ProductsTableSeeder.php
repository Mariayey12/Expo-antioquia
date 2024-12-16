<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Provider;
use App\Models\Promotion;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Obtener categorías existentes
        $categories = Category::all();
        $categoryHotel = $categories->where('name', 'Alojamiento')->first();
        $categoryRestaurant = $categories->where('name', 'Gastronomía')->first();

        // Obtener proveedores existentes
        $providers = Provider::all();
        $providerHotel = $providers->first(); // Ajusta según el proveedor deseado
        $providerRestaurant = $providers->last(); // Ajusta según el proveedor deseado

        // Crear productos asociados a categorías y proveedores
        $product1 = Product::create([
            'name' => 'Suite Deluxe en Hotel Antioquia',
            'description' => 'Habitación espaciosa con vistas espectaculares y desayuno incluido.',
            'price' => 350000,
            'stock' => 8,
            'categorizable_id' => $categoryHotel->id,
            'categorizable_type' => get_class($categoryHotel),
            'userable_id' => $providerHotel->id,
            'userable_type' => get_class($providerHotel),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $product2 = Product::create([
            'name' => 'Cena Gourmet en Sabores de Antioquia',
            'description' => 'Menú especial con los mejores ingredientes locales.',
            'price' => 95000,
            'stock' => 25,
            'categorizable_id' => $categoryRestaurant->id,
            'categorizable_type' => get_class($categoryRestaurant),
            'userable_id' => $providerRestaurant->id,
            'userable_type' => get_class($providerRestaurant),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Si ya tienes promociones cargadas en la base de datos
        $promotions = Promotion::all();
        if ($promotions->isNotEmpty()) {
            $promotion = $promotions->first();
            $promotion->promotionable_id = $product1->id;
            $promotion->promotionable_type = get_class($product1);
            $promotion->save();
        }
    }
}
