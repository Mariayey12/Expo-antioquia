<?php

namespace App\Http\Controllers;

use App\Models\Gastronomy;
use Illuminate\Http\Request;

class GastronomyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gastronomies = Gastronomy::all();
        return response()->json($gastronomies, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'contact_info' => 'nullable|json',
            'opening_hours' => 'nullable|string',
            'cost_range' => 'required|in:low,medium,high',
            'image_url' => 'nullable|url|max:2048',
            'video_url' => 'nullable|url|max:2048',
            'google_maps' => 'nullable|url|max:2048',
            'specialties' => 'nullable|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'is_open' => 'boolean',
            'average_rating' => 'nullable|numeric|min:0|max:5',
            'reviews_count' => 'nullable|integer|min:0',
        ]);

        $gastronomy = Gastronomy::create($validatedData);
        return response()->json($gastronomy, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $gastronomy = Gastronomy::find($id);

        if (!$gastronomy) {
            return response()->json(['message' => 'Gastronomy not found'], 404);
        }

        return response()->json($gastronomy, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $gastronomy = Gastronomy::find($id);

        if (!$gastronomy) {
            return response()->json(['message' => 'Gastronomy not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'address' => 'sometimes|required|string',
            'city' => 'sometimes|required|string',
            'contact_info' => 'nullable|json',
            'opening_hours' => 'nullable|string',
            'cost_range' => 'sometimes|required|in:low,medium,high',
            'image_url' => 'nullable|url|max:2048',
            'video_url' => 'nullable|url|max:2048',
            'google_maps' => 'nullable|url|max:2048',
            'specialties' => 'nullable|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'is_open' => 'boolean',
            'average_rating' => 'nullable|numeric|min:0|max:5',
            'reviews_count' => 'nullable|integer|min:0',
        ]);

        $gastronomy->update($validatedData);
        return response()->json($gastronomy, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gastronomy = Gastronomy::find($id);

        if (!$gastronomy) {
            return response()->json(['message' => 'Gastronomy not found'], 404);
        }

        $gastronomy->delete();
        return response()->json(['message' => 'Gastronomy deleted successfully'], 200);
    }
}
