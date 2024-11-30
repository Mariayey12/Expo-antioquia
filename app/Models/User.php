<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * Atributos asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'profile_picture',
        'role',
    ];

    /**
     * Atributos ocultos en serializaciones.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Atributos que deben ser casteados.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relación con el modelo Comentario.
     * Un usuario puede tener muchos comentarios.
     */
    public function comentarios()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    /**
     * Relación con el modelo Reserva.
     * Un usuario puede tener muchas reservas.
     */
    public function reservas()
    {
        return $this->hasMany(Reservation::class, 'user_id');
    }

    /**
     * Relación polimórfica.
     * Un usuario puede ser de diferentes tipos (administrador, proveedor, etc.).
     */
    public function userable()
    {
        return $this->morphTo();
    }

}

