<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar de manera masiva.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
    ];

    /**
     * Relación polimórfica con ReviewCalification (comentarios o calificaciones).
     */
    public function reviews()
    {
        return $this->morphMany(ReviewCalification::class, 'reviewable');
    }

    /**
     * Relación polimórfica con categorías.
     */
    public function categorizable()
    {
        return $this->morphTo();
    }

    /**
     * Relación polimórfica con proveedores (o cualquier otro modelo que uses).
     */
    public function userable()
    {
        return $this->morphTo();
    }
}
