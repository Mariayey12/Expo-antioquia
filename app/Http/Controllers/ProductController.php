<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    // Mostrar un producto específico
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    // Crear un nuevo producto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'categorizable_id' => 'nullable|integer',
            'categorizable_type' => 'nullable|string',
            'userable_id' => 'nullable|integer',
            'userable_type' => 'nullable|string',
        ]);

        $product = Product::create($validated);

        // Relacionar promociones si existen
        if ($request->has('promotion_ids')) {
            $product->promotions()->sync($request->promotion_ids);
        }

        return response()->json($product, 201);
    }

    // Actualizar un producto
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'categorizable_id' => 'nullable|integer',
            'categorizable_type' => 'nullable|string',
            'userable_id' => 'nullable|integer',
            'userable_type' => 'nullable|string',
        ]);

        $product->update($validated);

        // Relacionar promociones si existen
        if ($request->has('promotion_ids')) {
            $product->promotions()->sync($request->promotion_ids);
        }

        return response()->json($product);
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
