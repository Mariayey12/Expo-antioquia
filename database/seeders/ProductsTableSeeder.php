<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Promotion;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Crear productos con datos completos
        $product1 = Product::create([
            'name' => 'Product 1',
            'description' => 'High-quality gadget for modern living.',
            'price' => 100.00,
            'stock' => 15,
            'categorizable_id' => 1, // Example category ID (adjust as per your categorization logic)
            'categorizable_type' => 'App\Models\Category', // Adjust to your actual category model
            'userable_id' => 1, // Example user ID (adjust to your user model logic)
            'userable_type' => 'App\Models\User', // Adjust to your actual user model
        ]);

        $product2 = Product::create([
            'name' => 'Product 2',
            'description' => 'Affordable yet durable, perfect for any occasion.',
            'price' => 50.00,
            'stock' => 25,
            'categorizable_id' => 2,
            'categorizable_type' => 'App\Models\Category',
            'userable_id' => 2,
            'userable_type' => 'App\Models\User',
        ]);

        $product3 = Product::create([
            'name' => 'Product 3',
            'description' => 'Premium quality kitchen appliance for every home.',
            'price' => 200.00,
            'stock' => 10,
            'categorizable_id' => 3,
            'categorizable_type' => 'App\Models\Category',
            'userable_id' => 3,
            'userable_type' => 'App\Models\User',
        ]);

        // Crear promociones con datos completos
        $promotion1 = Promotion::create([
            'name' => 'Summer Sale',
            'description' => 'Get up to 20% off on all gadgets this summer.',
            'discount' => 20.00,
            'start_date' => now(),
            'end_date' => now()->addMonth(1),
        ]);

        $promotion2 = Promotion::create([
            'name' => 'Winter Special',
            'description' => 'Enjoy up to 15% off on selected products for the winter season.',
            'discount' => 15.00,
            'start_date' => now()->addMonth(1),
            'end_date' => now()->addMonth(2),
        ]);

        $promotion3 = Promotion::create([
            'name' => 'Black Friday Deals',
            'description' => 'Black Friday exclusive! Save up to 50% on selected products.',
            'discount' => 50.00,
            'start_date' => now()->addDays(10),
            'end_date' => now()->addDays(30),
        ]);

        // Relacionando productos con promociones
        // Aseguramos que los productos estén asociados con promociones de manera condicional

        $product1->promotions()->attach($promotion1->id);
        $product2->promotions()->attach([$promotion1->id, $promotion2->id]);
        $product3->promotions()->attach($promotion2->id);

        // Opcional: Si deseas asociar más promociones de forma aleatoria a los productos
        // Puedes usar lógica más avanzada, como un ciclo for o condición adicional
    }
}
