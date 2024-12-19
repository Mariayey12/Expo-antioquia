<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'user_id',
        'provider_id',
        'place_id',
        'status',
    ];

    // Relación con la reserva
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el proveedor
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    // Relación con el lugar
    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
