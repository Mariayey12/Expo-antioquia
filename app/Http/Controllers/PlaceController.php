<?php


namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los lugares
        $places = Place::all();
        return response()->json($places);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Este método puede no ser necesario para una API RESTful
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'climate' => 'required|string',
            'image_url' => 'required|url',
            'video_url' => 'required|url',
            'google_maps' => 'required|url',
            'category' => 'required|string',
            'categories' => 'required|json',
            'average_price' => 'required|numeric',
            'services' => 'required|json',
            'opening_time' => 'required|date_format:H:i',
            'closing_time' => 'required|date_format:H:i',
            'price_range' => 'required|string',
            'contact_number' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'price_per_night' => 'required|integer',
            'phone_number' => 'required|string',
            'rating' => 'required|numeric|between:0,10',
            'website' => 'required|url',
            'capacity' => 'required|integer',
            'menu' => 'required|json',
            'date' => 'required|date',
            'event_date' => 'required|date',
            'activities' => 'required|json',
            'duration_days' => 'required|integer',
            'artists' => 'required|string',
            'artist' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'provider_name' => 'required|string',
            'contact_info' => 'required|string',
            'material' => 'required|string',
            'technique' => 'required|string',
            'price' => 'required|numeric',
            'cost' => 'required|numeric',
            'duration' => 'required|string',
        ]);

        // Crear un nuevo lugar
        $place = Place::create($request->all());

        return response()->json($place, 201); // 201 Created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener un lugar por su ID
        $place = Place::findOrFail($id);
        return response()->json($place);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Este método puede no ser necesario para una API RESTful
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validación de datos
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'location' => 'sometimes|required|string',
            'climate' => 'sometimes|required|string',
            'image_url' => 'sometimes|required|url',
            'video_url' => 'sometimes|required|url',
            'google_maps' => 'sometimes|required|url',
            'category' => 'sometimes|required|string',
            'categories' => 'sometimes|required|json',
            'average_price' => 'sometimes|required|numeric',
            'services' => 'sometimes|required|json',
            'opening_time' => 'sometimes|required|date_format:H:i',
            'closing_time' => 'sometimes|required|date_format:H:i',
            'price_range' => 'sometimes|required|string',
            'contact_number' => 'sometimes|required|string',
            'email' => 'sometimes|required|email',
            'address' => 'sometimes|required|string',
            'city' => 'sometimes|required|string',
            'price_per_night' => 'sometimes|required|integer',
            'phone_number' => 'sometimes|required|string',
            'rating' => 'sometimes|required|numeric|between:0,10',
            'website' => 'sometimes|required|url',
            'capacity' => 'sometimes|required|integer',
            'menu' => 'sometimes|required|json',
            'date' => 'sometimes|required|date',
            'event_date' => 'sometimes|required|date',
            'activities' => 'sometimes|required|json',
            'duration_days' => 'sometimes|required|integer',
            'artists' => 'sometimes|required|string',
            'artist' => 'sometimes|required|string',
            'latitude' => 'sometimes|required|numeric',
            'longitude' => 'sometimes|required|numeric',
            'provider_name' => 'sometimes|required|string',
            'contact_info' => 'sometimes|required|string',
            'material' => 'sometimes|required|string',
            'technique' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric',
            'cost' => 'sometimes|required|numeric',
            'duration' => 'sometimes|required|string',
        ]);

        // Obtener el lugar por ID
        $place = Place::findOrFail($id);
        // Actualizar los datos
        $place->update($request->all());

        return response()->json($place);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Obtener el lugar por ID
        $place = Place::findOrFail($id);
        // Eliminar el lugar
        $place->delete();

        return response()->json(null, 204); // 204 No Content
    }
}
