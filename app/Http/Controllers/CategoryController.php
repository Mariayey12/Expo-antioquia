<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Muestra una lista de todas las categorías.
     * Método: GET /categories
     */
    public function index()
    {
        $categories = Category::all();

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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Category created successfully!',
            'data' => $category,
        ], 201);
    }

    /**
     * Muestra los detalles de una categoría específica.
     * Método: GET /categories/{id}
     */
    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $category,
        ], 200);
    }

    /**
     * Actualiza una categoría específica.
     * Método: PUT /categories/{id}
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully!',
            'data' => $category,
        ], 200);
    }

    /**
     * Elimina una categoría específica.
     * Método: DELETE /categories/{id}
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully!',
        ], 200);
    }
}
