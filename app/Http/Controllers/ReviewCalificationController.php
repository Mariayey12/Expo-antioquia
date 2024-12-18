<?php

namespace App\Http\Controllers;

use App\Models\ReviewCalification;
use Illuminate\Http\Request;

class ReviewCalificationController extends Controller
{
    // Mostrar todas las calificaciones y reseñas
    public function index()
    {
        $reviews = ReviewCalification::all();
        return response()->json($reviews, 200);
    }

    // Crear una nueva calificación o reseña
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:500',
        ]);

        $review = ReviewCalification::create($validatedData);

        return response()->json($review, 201);
    }

    // Mostrar una calificación o reseña específica
    public function show($id)
    {
        $review = ReviewCalification::findOrFail($id);
        return response()->json($review, 200);
    }

    // Actualizar una calificación o reseña existente
    public function update(Request $request, $id)
    {
        $review = ReviewCalification::findOrFail($id);

        $validatedData = $request->validate([
            'rating' => 'sometimes|integer|min:1|max:5',
            'review' => 'sometimes|string|max:500',
        ]);

        $review->update($validatedData);

        return response()->json($review, 200);
    }

    // Eliminar una calificación o reseña
    public function destroy($id)
    {
        $review = ReviewCalification::findOrFail($id);
        $review->delete();

        return response()->json(['message' => 'Review deleted successfully'], 204);
    }
}
