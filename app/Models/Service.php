<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
 protected $table = 'services';
    protected $fillable = [
        'name',
        'description',
        'cost',
        'duration',
        'category',
        'image_url',
        'provider_name',
        'location',
        'is_available',
        'available_from',
        'available_until',
        'contact_info',
        'comerce_id', // Agregamos la clave foránea
    ];

    // Relación con Comerce (pertenece a un comercio)
    public function comerce()
    {
        return $this->belongsTo(Comerce::class);
    }
}
