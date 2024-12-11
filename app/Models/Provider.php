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
    ];

    // Relación polimórfica con los usuarios (un proveedor puede tener muchos usuarios asociados)
    public function users()
    {
        return $this->morphMany(User::class, 'userable');
    }

    // Relación polimórfica con los servicios (un proveedor puede tener muchos servicios asociados)
    public function services()
    {
        return $this->morphMany(Service::class, 'serviceable');
    } 
}
