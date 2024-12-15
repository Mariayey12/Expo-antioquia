<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

     /**
     * Get the parent clientable model (Testimonial or otro modelo).
     */
    public function clientable()
    {
        return $this->morphTo();
    }

     // Relación con User (Uno a Uno)
     public function user()
     {
         return $this->belongsTo(User::class);
     }
     
}
