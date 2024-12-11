<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['fecha_reserva', 'hora_reserva', 'cantidad_personas', 'estado', 'notas'];

    /**
     * Relación polimórfica con usuarios.
     */
    public function users()
    {
        return $this->morphToMany(User::class, 'userable');
    }
}
