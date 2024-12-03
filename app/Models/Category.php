<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    // Relación polimórfica con Places
    public function places()
    {
        return $this->morphedByMany(Place::class, 'categoriable'); // Cambio aquí
    }

    // Relación polimórfica con Services
    public function services()
    {
        return $this->morphedByMany(Service::class, 'categoriable'); // Cambio aquí
    }

    // Relación polimórfica con Commerce
    public function commerces()
    {
        return $this->morphedByMany(Commerce::class, 'categoriable'); // Cambio aquí
    }

    // Relación polimórfica inversa
    public function categoriables()
    {
        return $this->morphTo();
    }
}
