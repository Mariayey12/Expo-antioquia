<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $casts = [
        'categories' => 'array',
    ];

    // Relación polimórfica con Places
    public function places()
    {
        return $this->morphedByMany(Place::class, 'categorizable');
    }


    // Relación polimórfica con Services
    public function services()
    {
        return $this->morphedByMany(Service::class, 'categorizable');
    }

     /**
     * Relación polimórfica inversa para comercios.
     */
  // Relación polimórfica muchos a muchos inversa


  public function commerces()
  {
      return $this->morphedByMany(Commerce::class, 'categorizable');
  }

  public function gastronomies()
{
    return $this->morphedByMany(Gastronomy::class, 'categorizable');
}


// App\Models\Category.php

public function events()
{
    return $this->morphedByMany(Event::class, 'categorizable');
}



}

