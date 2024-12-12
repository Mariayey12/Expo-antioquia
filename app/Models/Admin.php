<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    /**
     * Campos que pueden asignarse de forma masiva.
     *
     * @var array<string>
     */
    protected $fillable = [
        'permissions',
        'department',
        'notes',
    ];

    /**
     * Relación polimórfica con el modelo User.
     * Cada administrador tiene un usuario asociado.
     */
    public function user()
    {
        return $this->morphOne(User::class, 'userable');

    }
    // Relación polimórfica
    public function userable()
    {
        return $this->morphTo();
    }

}
