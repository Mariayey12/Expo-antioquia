<?php

namespace App\Http\Controllers;

use App\Models\Commerce;
use App\Models\Place;
use App\Models\Category;
use Illuminate\Http\Request;

class CommerceController extends Controller
{
    /**
     * Store a newly created commerce in storage along with its relationships.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos de la solicitud
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'image_url' => 'nullable|url',
            'video_url' => 'nullable|url',
            'google_maps' => 'nullable|url',
            'contact_number' => 'nullable|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'placeable_id' => 'nullable|integer',  // ID del lugar
            'placeable_type' => 'nullable|string',  // Tipo de lugar (Place)
            'categorizable_id' => 'nullable|integer',  // ID de la categoría
            'categorizable_type' => 'nullable|string',  // Tipo de la categoría (Category)
        ]);

        // Crear el comercio
        $commerce = Commerce::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'] ?? null,
            'location' => $validatedData['location'] ?? null,
            'image_url' => $validatedData['image_url'] ?? null,
            'video_url' => $validatedData['video_url'] ?? null,
            'google_maps' => $validatedData['google_maps'] ?? null,
            'contact_number' => $validatedData['contact_number'] ?? null,
            'email' => $validatedData['email'] ?? null,
            'website' => $validatedData['website'] ?? null,
        ]);

        // Asociar el lugar polimórfico si se especifica
        if ($request->has('placeable_id') && $request->has('placeable_type')) {
            $placeableType = $validatedData['placeable_type'];
            $placeableId = $validatedData['placeable_id'];

            // Validar si el tipo de lugar es válido
            if (in_array($placeableType, [Place::class])) {
                $commerce->places()->attach($placeableId);
            }
        }

        // Asociar la categoría polimórfica si se especifica
        if ($request->has('categorizable_id') && $request->has('categorizable_type')) {
            $categorizableType = $validatedData['categorizable_type'];
            $categorizableId = $validatedData['categorizable_id'];

            // Validar si el tipo de categoría es válido
            if (in_array($categorizableType, [Category::class])) {
                $commerce->categories()->attach($categorizableId);
            }
        }

        return response()->json([
            'message' => 'Commerce created successfully!',
            'commerce' => $commerce,
        ], 201);
    }

    /**
     * Display a listing of the commerces.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commerces = Commerce::with(['places', 'categories'])->get();
        return response()->json($commerces);
    }

    /**
     * Display the specified commerce.
     *
     * @param  \App\Models\Commerce  $commerce
     * @return \Illuminate\Http\Response
     */
    public function show(Commerce $commerce)
    {
        $commerce->load(['places', 'categories']);
        return response()->json($commerce);
    }

    /**
     * Update the specified commerce in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Commerce $commerce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commerce $commerce)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'image_url' => 'nullable|url',
            'video_url' => 'nullable|url',
            'google_maps' => 'nullable|url',
            'contact_number' => 'nullable|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
        ]);

        $commerce->update($validatedData);

        // Asociar el lugar polimórfico si se especifica
        if ($request->has('placeable_id') && $request->has('placeable_type')) {
            $placeableType = $request->placeable_type;
            $placeableId = $request->placeable_id;

            // Validar si el tipo de lugar es válido
            if (in_array($placeableType, [Place::class])) {
                $commerce->places()->sync([$placeableId]);
            }
        }

        // Asociar la categoría polimórfica si se especifica
        if ($request->has('categorizable_id') && $request->has('categorizable_type')) {
            $categorizableType = $request->categorizable_type;
            $categorizableId = $request->categorizable_id;

            // Validar si el tipo de categoría es válido
            if (in_array($categorizableType, [Category::class])) {
                $commerce->categories()->sync([$categorizableId]);
            }
        }

        return response()->json([
            'message' => 'Commerce updated successfully!',
            'commerce' => $commerce,
        ]);
    }

    /**
     * Remove the specified commerce from storage.
     *
     * @param  \App\Models\Commerce  $commerce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commerce $commerce)
    {
        $commerce->delete();

        return response()->json([
            'message' => 'Commerce deleted successfully!',
        ]);
    }
}
