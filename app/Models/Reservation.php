<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'reservations';

    // Atributos asignables en masa
    protected $fillable = [
        'user_id',
        'service_id',
        'fecha_reserva',
        'hora_reserva',
        'cantidad_personas',
        'estado',
        'notas',
    ];

    /**
     * Relación con el modelo User.
     * Una reserva pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relación con el modelo Service.
     * Una reserva está asociada a un servicio.
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
