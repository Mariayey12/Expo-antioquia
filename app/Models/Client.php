<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'name',
        'email',
        'user_id', // Relación con el usuario
        'membership_status', // Estatus de membresía
        'phone_number', // Número de teléfono
        'address', // Dirección
        'clientable_type', // Tipo de modelo polimórfico
        'clientable_id', // ID del modelo polimórfico
    ];

    // Relación con User (Uno a Uno)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación polimórfica (morphTo)
    public function clientable()
    {
        return $this->morphTo();
    }

    // Relación con Testimonial (si aplica)
    public function testimonials()
    {
        return $this->morphMany(Testimonial::class, 'clientable');
    }

    // Relación con Reservation (si aplica)
    public function reservations()
    {
        return $this->morphMany(Reservation::class, 'clientable');
    }
}
