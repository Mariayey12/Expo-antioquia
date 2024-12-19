<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Reservation;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Valida la solicitud (si es necesario)
        $validated = $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'user_id' => 'required|exists:users,id',
            'provider_id' => 'required|exists:providers,id',
            'place_id' => 'required|exists:places,id',
            'status' => 'required|in:booked,cancelled',
        ]);

        // Crea el booking
        $booking = Booking::create($validated);

        return response()->json($booking, 201);
    }
}
