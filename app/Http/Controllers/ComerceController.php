<?php

namespace App\Http\Controllers;

use App\Models\Comerce;
use Illuminate\Http\Request;

class ComerceController extends Controller
{
    // Mostrar todos los comercios
    public function index()
    {
        return Comerce::with('services')->get();
    }

    // Crear un nuevo comercio
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:50',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'categories' => 'nullable|json',
            'image_url' => 'nullable|url',
        ]);

        return Comerce::create($validated);
    }

    // Mostrar un comercio específico
    public function show($id)
    {
        return Comerce::with('services')->findOrFail($id);
    }

    // Actualizar un comercio existente
    public function update(Request $request, $id)
    {
        $comerce = Comerce::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'sometimes|required|string|max:255',
            'contact_number' => 'nullable|string|max:50',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'categories' => 'nullable|json',
            'image_url' => 'nullable|url',
        ]);

        $comerce->update($validated);
        return $comerce;
    }

    // Eliminar un comercio
    public function destroy($id)
    {
        $comerce = Comerce::findOrFail($id);
        $comerce->delete();
        return response()->noContent();
    }
}
