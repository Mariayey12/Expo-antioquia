<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Definir los campos que son asignables masivamente
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'categorizable_id',
        'categorizable_type',
        'userable_id',
        'userable_type'
    ];

    //Relación polimórfica con ReviewCalification (comentarios o calificaciones).

   public function reviews()
   {
       return $this->morphMany(ReviewCalification::class, 'reviewable');
   }

    // Relación muchos a muchos con promociones
    public function promotions()
    {
        return $this->belongsToMany(Promotion::class, 'promotion_product');
    }

    
    // Relación polimórfica: un producto puede pertenecer a diferentes modelos
    public function categorizable()
    {
        return $this->morphTo();
    }

    // Relación polimórfica: un producto puede ser asignado a un usuario
    public function userable()
    {
        return $this->morphTo();
    }

    // Accesores y mutadores si lo necesitas
    // Ejemplo de un accesor para obtener el precio con formato
    public function getPriceAttribute($value)
    {
        return number_format($value, 2);
    }

    // Método para actualizar el stock
    public function updateStock($quantity)
    {
        $this->stock -= $quantity;
        $this->save();
    }
}
