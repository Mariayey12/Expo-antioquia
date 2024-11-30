<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    // Si el nombre de la tabla no sigue la convención plural en inglés, especifica el nombre de la tabla
    protected $table = 'providers';
    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'company_name',
        'services',
    ];



    // En el modelo Proveedor
public function users()
{
    return $this->morphMany(User::class, 'userable');
}

}
