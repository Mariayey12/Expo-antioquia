<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Handicraft extends Model
{
    use HasFactory;

    protected $table = 'handicrafts';

    protected $fillable = [
        'name',
        'description',
        'location',
        'image_url',
        'material',
        'technique',
        'price',
        'categories',
        'artist',
        'contact_info',
    ];
// Definición de la relación con Cultura
    public function culturas()
    {
        return $this->belongsToMany(Culture::class, 'artesania_cultura', 'artesanias_id', 'cultura_id');
    }
    // Relaciones (si aplica)
    public function eventos()
    {
        return $this->belongsToMany(Evento::class);
    }
}
