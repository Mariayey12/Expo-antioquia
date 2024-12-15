<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Listar todos los eventos
    public function index()
    {
        return response()->json(Event::all(), 200);
    }

    // Mostrar un evento específico
    public function show($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        return response()->json($event, 200);
    }

    // Crear un nuevo evento
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required|string|max:255',
            'cost' => 'nullable|numeric',
            'organizer_name' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
            'image_url' => 'nullable|url',
            'video_url' => 'nullable|url',
            'google_maps' => 'nullable|url',
            'is_active' => 'boolean',
        ]);

        $event = Event::create($validatedData);

        return response()->json($event, 201);
    }

    // Actualizar un evento
    public function update(Request $request, $id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date|after_or_equal:start_date',
            'location' => 'sometimes|required|string|max:255',
            'cost' => 'nullable|numeric',
            'organizer_name' => 'sometimes|required|string|max:255',
            'contact_info' => 'sometimes|required|string|max:255',
            'image_url' => 'nullable|url',
            'video_url' => 'nullable|url',
            'google_maps' => 'nullable|url',
            'is_active' => 'boolean',
        ]);

        $event->update($validatedData);

        return response()->json($event, 200);
    }

    // Eliminar un evento
    public function destroy($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $event->delete();

        return response()->json(['message' => 'Event deleted successfully'], 200);
    }
}
