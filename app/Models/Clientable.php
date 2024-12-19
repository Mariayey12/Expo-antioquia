<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientable extends Model
{
    // Si la tabla no es plural, podemos especificar el nombre de la tabla manualmente:
    // protected $table = 'clientable';

    /**
     * Get the parent clientable model (user or testimonial).
     */
    public function clientable()
    {
        return $this->morphTo();
    }
    
}
