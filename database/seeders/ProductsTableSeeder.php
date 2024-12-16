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
            Product::create([
                'name' => $faker->word(), // Nombre del producto
                'description' => $faker->sentence(), // Descripción del producto
                'price' => $faker->randomFloat(2, 10, 500), // Precio aleatorio entre 10 y 500
                'category_id' => $categories->random()->id, // Relacionar con una categoría aleatoria
                'provider_id' => $providers->random()->id, // Relacionar con un proveedor aleatorio
                'stock' => $faker->numberBetween(1, 100), // Stock aleatorio entre 1 y 100
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
