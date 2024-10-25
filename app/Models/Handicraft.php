<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Handicraf extends Model
{
    use HasFactory;

    protected $table = 'artesanias';

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

    // Relaciones (si aplica)
    public function eventos()
    {
        return $this->belongsToMany(Evento::class);
    }
}
