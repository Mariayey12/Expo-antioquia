<?php

namespace App\Http\Controllers;

use App\Models\Commerce;
use Illuminate\Http\Request;

class CommerceController extends Controller
{
    /**
     * Muestra una lista de comercios.
     * API: GET /api/commerces
     * Web: GET /commerces
     */
    public function index(Request $request)
    {
        $commerces = Commerce::all();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $commerces
            ], 200);
        }

        return view('commerces.index', compact('commerces'));
    }

    /**
     * Almacena un nuevo comercio en la base de datos.
     * API: POST /api/commerces
     * Web: POST /commerces
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'image_url' => 'nullable|url',
            'video_url' => 'nullable|url',
            'google_maps' => 'nullable|url',
            'category' => 'nullable|string',
            'contact_number' => 'nullable|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'categories' => 'nullable|array',
        ]);

        $commerce = Commerce::create($validatedData);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Commerce created successfully!',
                'data' => $commerce,
            ], 201);
        }

        return redirect()->route('commerces.index')->with('success', 'Commerce created successfully!');
    }

    /**
     * Muestra un comercio específico.
     * API: GET /api/commerces/{id}
     * Web: GET /commerces/{id}
     */
    public function show(Request $request, $id)
    {
        $commerce = Commerce::find($id);

        if (!$commerce) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Commerce not found',
                ], 404);
            }

            abort(404);
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $commerce,
            ], 200);
        }

        return view('commerces.show', compact('commerce'));
    }

    /**
     * Actualiza un comercio.
     * API: PUT /api/commerces/{id}
     * Web: PUT /commerces/{id}
     */
    public function update(Request $request, $id)
    {
        $commerce = Commerce::find($id);

        if (!$commerce) {
            return response()->json([
                'success' => false,
                'message' => 'Commerce not found',
            ], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'image_url' => 'nullable|url',
            'video_url' => 'nullable|url',
            'google_maps' => 'nullable|url',
            'category' => 'nullable|string',
            'contact_number' => 'nullable|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'categories' => 'nullable|array',
        ]);

        $commerce->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Commerce updated successfully!',
            'data' => $commerce,
        ], 200);
    }

    /**
     * Elimina un comercio.
     * API: DELETE /api/commerces/{id}
     * Web: DELETE /commerces/{id}
     */
    public function destroy(Request $request, $id)
    {
        $commerce = Commerce::find($id);

        if (!$commerce) {
            return response()->json([
                'success' => false,
                'message' => 'Commerce not found',
            ], 404);
        }

        $commerce->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Commerce deleted successfully!',
            ], 200);
        }

        return redirect()->route('commerces.index')->with('success', 'Commerce deleted successfully!');
    }
}
