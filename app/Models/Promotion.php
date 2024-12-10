<?php

// App\Models\Promotion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'discount', 'gastronomia_id'];

    public function gastronomy()
    {
        return $this->belongsTo(Gastronomia::class);
    }
}
