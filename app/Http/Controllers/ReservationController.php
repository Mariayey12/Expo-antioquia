<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     * Muestra una lista de todas las reservas.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return response()->json($reservations);
    }

    /**
     * Store a newly created resource in storage.
     * Almacena una nueva reserva.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|integer|exists:users,id',
            'servicio_id' => 'required|integer|exists:services,id',
            'fecha_reserva' => 'required|date',
            'hora_reserva' => 'required|date_format:H:i',
            'cantidad_personas' => 'required|integer|min:1',
            'estado' => 'required|string|max:255',
            'notas' => 'nullable|string|max:1000',
        ]);

        $reservation = Reservation::create([
            'usuario_id' => $request->usuario_id,
            'servicio_id' => $request->servicio_id,
            'fecha_reserva' => $request->fecha_reserva,
            'hora_reserva' => $request->hora_reserva,
            'cantidad_personas' => $request->cantidad_personas,
            'estado' => $request->estado,
            'notas' => $request->notas,
        ]);

        return response()->json(['message' => 'Reserva creada exitosamente', 'reservation' => $reservation], 201);
    }

    /**
     * Display the specified resource.
     * Muestra una reserva específica.
     */
    public function show(string $id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }

        return response()->json($reservation);
    }

    /**
     * Update the specified resource in storage.
     * Actualiza una reserva específica.
     */
    public function update(Request $request, string $id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }

        $request->validate([
            'fecha_reserva' => 'sometimes|date',
            'hora_reserva' => 'sometimes|date_format:H:i',
            'cantidad_personas' => 'sometimes|integer|min:1',
            'estado' => 'sometimes|string|max:255',
            'notas' => 'nullable|string|max:1000',
        ]);

        $reservation->update($request->only([
            'fecha_reserva',
            'hora_reserva',
            'cantidad_personas',
            'estado',
            'notas',
        ]));

        return response()->json(['message' => 'Reserva actualizada correctamente', 'reservation' => $reservation]);
    }

    /**
     * Remove the specified resource from storage.
     * Elimina una reserva.
     */
    public function destroy(string $id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }

        $reservation->delete();

        return response()->json(['message' => 'Reserva eliminada exitosamente']);
    }
}
