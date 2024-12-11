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
        'userable_type', // Se agregó para la relación polimórfica
        'userable_id',   // Se agregó para la relación polimórfica
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
        return $this->morphedByMany(Comment::class, 'userable');
    }

    /**
     * Relación con el modelo Reserva.
     * Un usuario puede tener muchas reservas.
     */
    public function reservas()
    {
        return $this->morphedByMany(Reservation::class, 'userable');
    }

    /**
     * Relación polimórfica.
     * Un usuario puede ser de diferentes tipos (administrador, proveedor, etc.).
     */
    public function userable()
    {
        return $this->morphTo();
    }

    /**
     * Relación muchos a muchos polimórfica con los lugares.
     */
    public function places()
    {
        return $this->morphedByMany(Place::class, 'userable');
    }

    /**
     * Relación uno a muchos polimórfica con los servicios.
     */
    public function services()
    {
        return $this->morphedByMany(Service::class, 'userable');
    }

    /**
     * Sobrescribir el método `save` para cifrar la contraseña antes de guardar el usuario.
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if ($user->password) {
                $user->password = bcrypt($user->password); // Cifra la contraseña antes de guardarla
            }
        });
    }
}
