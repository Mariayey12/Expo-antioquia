<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    /**
     * Get the clientable relationship.
     */
    public function clientable()
    {
        return $this->morphOne(Client::class, 'clientable');
    }

}


