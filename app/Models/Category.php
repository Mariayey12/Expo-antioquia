<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];

    public function places()
    {
        return $this->morphedByMany(Place::class, 'categoriables');
    }

    public function services()
    {
        return $this->morphedByMany(Service::class, 'categoriables');
    }

    public function commerce()
    {
        return $this->morphedByMany(Commerce::class, 'categoriables');
    }
}
