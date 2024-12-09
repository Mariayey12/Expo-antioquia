<?php

// App\Models\Event.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'location', 'start_date', 'end_date', 'image_url'];

    // Relación polimórfica con gastronomía
    public function gastronomy()
    {
        return $this->morphedByMany(Gastronomia::class, 'eventable');
    }
}
