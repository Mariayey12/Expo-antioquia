<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Provider;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Obtener todas las categorías y proveedores disponibles en la base de datos
        $categories = Category::all();
        $providers = Provider::all();

        // Crear 50 productos de ejemplo
        foreach (range(1, 50) as $index) {
            $product = Product::create([
                'name' => $faker->word(),
                'description' => $faker->sentence(),
                'price' => $faker->randomFloat(2, 10, 500),
                'stock' => $faker->numberBetween(1, 100),
                'userable_id',
        'userable_type',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Asignar una categoría aleatoria
            $category = $categories->random();
            $product->categorizable()->associate($category); // Relación polimórfica con categoría
            $product->save();

            // Asignar un proveedor aleatorio
            $provider = $providers->random();
            $product->userable()->associate($provider); // Relación polimórfica con proveedor
            $product->save();
        }
    }
}
