<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ReviewCalification;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Mostrar una lista de todos los productos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los productos
        $products = Product::all();

        return response()->json($products);
    }

    /**
     * Mostrar los detalles de un producto.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Buscar el producto por ID
        $product = Product::findOrFail($id);

        // Incluir las calificaciones (reviews) si las tiene
        $product->load('reviews');

        return response()->json($product);
    }

    /**
     * Almacenar un nuevo producto.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Crear el nuevo producto
        $product = Product::create($validated);

        return response()->json($product, 201);
    }

    /**
     * Actualizar los detalles de un producto.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validación de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Buscar el producto por ID
        $product = Product::findOrFail($id);

        // Actualizar el producto
        $product->update($validated);

        return response()->json($product);
    }

    /**
     * Eliminar un producto.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Buscar el producto por ID
        $product = Product::findOrFail($id);

        // Eliminar el producto
        $product->delete();

        return response()->json(null, 204);
    }
}

