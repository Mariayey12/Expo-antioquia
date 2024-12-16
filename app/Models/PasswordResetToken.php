<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    use HasFactory;

    // Especifica la tabla que se va a usar
    protected $table = 'password_reset_tokens';

    // No necesitamos un auto-incremento para el campo 'email' (es la clave primaria)
    public $incrementing = false;

    // Definir qué campos se pueden asignar masivamente
    protected $fillable = [
        'email',
        'token',
        'created_at',
    ];

    // Si no se utiliza la marca de tiempo 'created_at' o 'updated_at'
    public $timestamps = false;

    public function user()
{
    return $this->belongsTo(User::class, 'email', 'email');
}

}
