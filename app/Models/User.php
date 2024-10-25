<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
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
        return $this->hasMany(Comentario::class, 'usuario_id');
    }

    /**
     * Relación con el modelo Reserva.
     * Un usuario puede tener muchas reservas.
     */
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'usuario_id');
    }
}
