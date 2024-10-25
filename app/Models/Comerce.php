<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comerce extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'contact_number',
        'email',
        'website',
        'categories',
        'image_url',
    ];

    // Relación con Service (uno a muchos)
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
