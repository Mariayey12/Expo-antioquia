<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Mostrar todos los servicios
    public function index()
    {
        return Service::with('comerce')->get();
    }

    // Crear un nuevo servicio
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cost' => 'nullable|numeric',
            'duration' => 'nullable|string',
            'category' => 'nullable|string',
            'image_url' => 'nullable|url',
            'provider_name' => 'nullable|string',
            'location' => 'nullable|string',
            'is_available' => 'boolean',
            'available_from' => 'nullable|date',
            'available_until' => 'nullable|date',
            'contact_info' => 'nullable|string',
            'comerce_id' => 'required|exists:comerces,id', // Asegúrate que el comercio exista
        ]);

        return Service::create($validated);
    }

    // Mostrar un servicio específico
    public function show($id)
    {
        return Service::with('comerce')->findOrFail($id);
    }

    // Actualizar un servicio existente
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'cost' => 'nullable|numeric',
            'duration' => 'nullable|string',
            'category' => 'nullable|string',
            'image_url' => 'nullable|url',
            'provider_name' => 'nullable|string',
            'location' => 'nullable|string',
            'is_available' => 'boolean',
            'available_from' => 'nullable|date',
            'available_until' => 'nullable|date',
            'contact_info' => 'nullable|string',
            'comerce_id' => 'sometimes|required|exists:comerces,id', // Asegúrate que el comercio exista
        ]);

        $service->update($validated);
        return $service;
    }

    // Eliminar un servicio
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return response()->noContent();
    }
}
