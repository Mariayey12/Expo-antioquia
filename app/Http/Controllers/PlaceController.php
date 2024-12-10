<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Muestra todos los lugares.
     * Método: GET /places
     */
    public function index()
    {
        $places = Place::all(); // Obtiene todos los lugares

        return response()->json([
            'success' => true,
            'data' => $places
        ], 200);
    }

    /**
     * Almacena un nuevo lugar en la base de datos.
     * Método: POST /places
     */
    public function store(Request $request)
    {
        // Validación de los datos entrantes
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'image_url' => 'nullable|string',
            'video_url' => 'nullable|string',
            'google_maps' => 'nullable|string',
            'average_price' => 'nullable|numeric',
            'opening_time' => 'nullable|string',
            'closing_time' => 'nullable|string',
            'price_range' => 'nullable|string',
            'contact_number' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'price_per_night' => 'nullable|numeric',
            'phone_number' => 'nullable|string',
            'rating' => 'nullable|numeric',
            'website' => 'nullable|string',
            'capacity' => 'nullable|numeric',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'has_parking' => 'nullable|boolean',
            'is_renovated' => 'nullable|boolean',
            'last_renovation_date' => 'nullable|date',
            'reviews_count' => 'nullable|numeric',
        ]);

        $place = Place::create($validatedData); // Crea el lugar

        return response()->json([
            'success' => true,
            'message' => 'Place created successfully!',
            'data' => $place
        ], 201);
    }

    /**
     * Muestra los detalles de un lugar específico.
     * Método: GET /places/{id}
     */
    public function show($id)
    {
        $place = Place::find($id); // Busca el lugar por ID

        if (!$place) {
            return response()->json([
                'success' => false,
                'message' => 'Place not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $place
        ], 200);
    }

    /**
     * Actualiza un lugar específico.
     * Método: PUT /places/{id}
     */
    public function update(Request $request, $id)
    {
        $place = Place::find($id); // Busca el lugar por ID

        if (!$place) {
            return response()->json([
                'success' => false,
                'message' => 'Place not found',
            ], 404);
        }

        // Validación de los datos entrantes
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'image_url' => 'nullable|string',
            'video_url' => 'nullable|string',
            'google_maps' => 'nullable|string',
            'average_price' => 'nullable|numeric',
            'opening_time' => 'nullable|string',
            'closing_time' => 'nullable|string',
            'price_range' => 'nullable|string',
            'contact_number' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'price_per_night' => 'nullable|numeric',
            'phone_number' => 'nullable|string',
            'rating' => 'nullable|numeric',
            'website' => 'nullable|string',
            'capacity' => 'nullable|numeric',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'has_parking' => 'nullable|boolean',
            'is_renovated' => 'nullable|boolean',
            'last_renovation_date' => 'nullable|date',
            'reviews_count' => 'nullable|numeric',
        ]);

        $place->update($validatedData); // Actualiza el lugar

        return response()->json([
            'success' => true,
            'message' => 'Place updated successfully!',
            'data' => $place
        ], 200);
    }

    /**
     * Elimina un lugar específico.
     * Método: DELETE /places/{id}
     */
    public function destroy($id)
    {
        $place = Place::find($id); // Busca el lugar por ID

        if (!$place) {
            return response()->json([
                'success' => false,
                'message' => 'Place not found',
            ], 404);
        }

        $place->delete(); // Elimina el lugar

        return response()->json([
            'success' => true,
            'message' => 'Place deleted successfully!',
        ], 200);
    }

    /**
     * Muestra las categorías de un lugar.
     * Método: GET /places/{id}/categories
     */
    public function showCategories($id)
    {
        $place = Place::findOrFail($id);
        return response()->json($place->categories); // Devuelve las categorías asociadas a ese lugar
    }

    /**
     * Muestra los servicios de un lugar.
     * Método: GET /places/{id}/services
     */
    public function showServices($id)
    {
        $place = Place::findOrFail($id);
        return response()->json($place->services); // Devuelve los servicios asociados a ese lugar
    }

    /**
     * Muestra los comercios de un lugar.
     * Método: GET /places/{id}/commerces
     */
    public function showCommerces($id)
    {
        $place = Place::findOrFail($id);
        return response()->json($place->commerces); // Devuelve los comercios asociados a ese lugar
    }

    /**
     * Muestra las reseñas de un lugar.
     * Método: GET /places/{id}/reviews
     */
    public function showReviews($id)
    {
        $place = Place::findOrFail($id);
        return response()->json($place->reviews); // Devuelve las reseñas asociadas a ese lugar
    }

    /**
     * Muestra las reservas de un lugar.
     * Método: GET /places/{id}/reservations
     */
    public function showReservations($id)
    {
        $place = Place::findOrFail($id);
        return response()->json($place->reservations); // Devuelve las reservas asociadas a ese lugar
    }

    /**
     * Muestra los comentarios de un lugar.
     * Método: GET /places/{id}/comments
     */
    public function showComments($id)
    {
        $place = Place::findOrFail($id);
        return response()->json($place->comments); // Devuelve los comentarios asociados a ese lugar
    }
}
