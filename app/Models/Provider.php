<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    /**
     * La tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'providers';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'company_name',
        'contact_person',
    ];

    /**
     * Relación polimórfica con el modelo User (userable).
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    /**
     * Relación polimórfica con el modelo Service (serviceable).
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function services()
    {
        return $this->morphMany(Service::class, 'serviceable');
    }

    /**
     * Ejemplo de búsqueda personalizada: Encontrar proveedores por nombre.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByName($query, $name)
    {
        return $query->where('name', 'like', "%{$name}%");
    }

    /**
     * Ejemplo de mutador para el atributo `name`.
     * Convierte el nombre en formato capitalizado.
     *
     * @param string $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }

    /**
     * Ejemplo de accesor para el atributo `contact_person`.
     * Devuelve el nombre del contacto en mayúsculas.
     *
     * @return string
     */
    public function getContactPersonAttribute($value)
    {
        return strtoupper($value);
    }
}
