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
        'userable_type',
        'userable_id',
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
    ];

    /**
     * Relación polimórfica uno a uno con el modelo userable (roles específicos).
     */
    public function userable()
    {
        return $this->morphTo();
    }

    /**
     * Relación polimórfica muchos a muchos con comentarios.
     */
    public function comentarios()
    {
        return $this->morphedByMany(Comment::class, 'userable');
    }

    /**
     * Relación polimórfica muchos a muchos con reservas.
     */
    public function reservas()
    {
        return $this->morphedByMany(Reservation::class, 'userable');
    }

    /**
     * Relación polimórfica muchos a muchos con lugares.
     */
    public function places()
    {
        return $this->morphedByMany(Place::class, 'userable');
    }

    /**
     * Relación polimórfica muchos a muchos con servicios.
     */
    public function services()
    {
        return $this->morphedByMany(Service::class, 'userable');
    }
// User.php
public function passwordResets()
{
    return $this->hasMany(PasswordResetToken::class, 'email', 'email');
}

    /**
     * Evento para cifrar contraseñas antes de guardar un usuario.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if ($user->password) {
                $user->password = bcrypt($user->password);
            }
        });

        static::updating(function ($user) {
            if ($user->isDirty('password')) {
                $user->password = bcrypt($user->password);
            }
        });
    }
}
