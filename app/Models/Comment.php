<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'service_id',
        'contenido',
        'calificacion',
    ];

    /**
     * Relación con el modelo User.
     * Un comentario pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    /**
     * Relación con el modelo Service.
     * Un comentario pertenece a un servicio.
     */
    public function servicio()
    {
        return $this->belongsTo(Service::class, 'servicio_id');
    }
}

