<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Muestra todas las categorías.
     * Método: GET /categories
     */
    public function index()
    {
        $categories = Category::all(); // Obtiene todas las categorías

        return response()->json([
            'success' => true,
            'data' => $categories
        ], 200);
    }

    /**
     * Almacena una nueva categoría en la base de datos.
     * Método: POST /categories
     */
    public function store(Request $request)
    {
        // Validación de los datos entrantes
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::create($validatedData); // Crea la categoría

        return response()->json([
            'success' => true,
            'message' => 'Category created successfully!',
            'data' => $category
        ], 201);
    }

    /**
     * Muestra los detalles de una categoría específica.
     * Método: GET /categories/{id}
     */
    public function show($id)
    {
        $category = Category::find($id); // Busca la categoría por ID

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $category
        ], 200);
    }

    /**
     * Actualiza una categoría específica.
     * Método: PUT /categories/{id}
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id); // Busca la categoría por ID

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }

        // Validación de los datos entrantes
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($validatedData); // Actualiza la categoría

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully!',
            'data' => $category
        ], 200);
    }

    /**
     * Elimina una categoría específica.
     * Método: DELETE /categories/{id}
     */
    public function destroy($id)
    {
        $category = Category::find($id); // Busca la categoría por ID

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }

        $category->delete(); // Elimina la categoría

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully!',
        ], 200);
    }

    /**
     * Muestra los lugares asociados a una categoría.
     * Método: GET /categories/{id}/places
     */
    public function showPlaces($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category->places); // Devuelve los lugares asociados a esa categoría
    }

    /**
     * Muestra los servicios asociados a una categoría.
     * Método: GET /categories/{id}/services
     */
    public function showServices($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category->services); // Devuelve los servicios asociados a esa categoría
    }

    /**
     * Muestra los comercios asociados a una categoría.
     * Método: GET /categories/{id}/commerces
     */
    public function showCommerces($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category->commerces); // Devuelve los comercios asociados a esa categoría
    }
}

