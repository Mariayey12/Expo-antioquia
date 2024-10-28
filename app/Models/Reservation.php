<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */ protected $table = 'reservations';
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
        return $this->belongsTo(User::class, 'usuario_id');
    }

    /**
     * Relación con el modelo Servicio.
     * Una reserva pertenece a un servicio.
     */
    public function servicio()
    {
        return $this->belongsTo(Service::class, 'servicio_id');
    }
}
