<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gastronomy extends Model
{
    use HasFactory;
    protected $table = 'gastronomy';
    protected $fillable = [
        'name',
        'description',
        'location',
        'image_url',
        'google_maps',
        'category',
        'latitude',
        'longitude',
        'video_url',
    ];

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
}
