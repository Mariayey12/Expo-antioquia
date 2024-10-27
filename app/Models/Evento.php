<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'name',
        'description',
        'location',
        'image_url',
        'climate',
        'latitude',
        'longitude',
        'google_map_url',
        'category',
    ];

    // Relaciones (si aplica)
    public function cultura()
    {
        return $this->belongsTo(Culture::class);
    }
}
