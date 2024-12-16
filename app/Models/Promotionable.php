<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotionable extends Model
{
    use HasFactory;

     /**
     * Relación polimórfica con promociones.
     */
    public function promotions()
    {
        return $this->morphToMany(Promotion::class, 'promotionable');
    }
}
