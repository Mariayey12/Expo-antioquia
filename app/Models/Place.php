<?php
// app/Models/Place.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    // Relación polimórfica inversa
    public function services()
    {
        return $this->morphMany(Service::class, 'serviceable');
    }
}
