<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'name',            // Nombre del proveedor
        'email',           // Correo electrónico del proveedor
        'phone',           // Teléfono del proveedor
        'address',         // Dirección del proveedor
        'description',     // Descripción del proveedor (opcional)
        'profile_picture', // Imagen de perfil del proveedor (opcional)
        'website',         // Sitio web del proveedor (opcional)
        'company_name',    // Nombre de la empresa del proveedor (opcional)
        'contact_person',  // Persona de contacto del proveedor
    ];
// En el modelo Provider
public function user()
{
    return $this->morphOne(User::class, 'userable');
}

    /**
     * Relación Polimórfica con los Servicios.
     * Un proveedor puede ofrecer muchos servicios a través de una relación polimórfica.
     */
    public function services()
    {
        return $this->morphMany(Service::class, 'serviceable');
        // 'serviceable' es el nombre de la columna que identifica la relación polimórfica
    }

    /**
     * Relación Polimórfica con los Productos.
     * Un proveedor puede ofrecer muchos productos, también a través de una relación polimórfica.
     */
    public function products()
    {
        return $this->morphMany(Product::class, 'userable');
        // 'userable' es el nombre de la columna que identifica la relación polimórfica
    }

    /**
     * Relación con categorías.
     * Un proveedor puede tener muchas categorías asociadas.
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
        // Un proveedor puede tener muchas categorías asociadas a él.
    }

    /**
     * Relación con lugares.
     * Un proveedor puede tener muchos lugares asociados.
     */
    public function places()
    {
        return $this->hasMany(Place::class);
        // Un proveedor puede tener muchos lugares asociados a él.
    }

    /**
     * Relación con productos (Redundante porque ya está definido con morphMany).
     * Se elimina este método porque ya existe el método `products` utilizando `morphMany`.
     */
    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }

    /**
     * Relación con servicios (Redundante porque ya está definido con morphMany).
     * Se elimina este método porque ya existe el método `services` utilizando `morphMany`.
     */
    // public function services()
    // {
    //     return $this->hasMany(Service::class);
    // }

    /**
     * Relación con anuncios.
     * Un proveedor puede tener muchos anuncios a través de una relación polimórfica.
     */
    public function ads()
    {
        return $this->morphMany(Ad::class, 'advertisable');
        // 'advertisable' es el nombre de la columna que identifica la relación polimórfica
    }

    /**
     * Relación con reservas (a través de los lugares).
     * Un proveedor puede tener muchas reservas a través de sus lugares.
     */
    public function reservations()
    {
        return $this->hasManyThrough(Reservation::class, Place::class);
        // Un proveedor puede tener muchas reservas a través de los lugares que tiene asociados.
    }

    /**
     * Relación con bookings.
     * Un proveedor puede tener muchas reservas (bookings).
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
        // Un proveedor puede tener muchas reservas.
    }

    /**
     * Relación con usuarios (a través de reservas).
     * Un proveedor puede estar relacionado con muchos usuarios a través de las reservas.
     */
    public function users()
    {
        return $this->hasManyThrough(User::class, Reservation::class);
        // Un proveedor puede tener muchos usuarios a través de las reservas.
    }

    /**
     * Ejemplo de búsqueda personalizada.
     * Este método permite encontrar proveedores por nombre utilizando una búsqueda parcial.
     */
    public function scopeByName($query, $name)
    {
        return $query->where('name', 'like', "%{$name}%");
        // Filtra proveedores cuyo nombre contenga el término de búsqueda.
    }

    /**
     * Ejemplo de mutador para el atributo `name`.
     * Convierte el nombre a formato capitalizado.
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
        // Convierte el nombre en formato capitalizado (primer letra en mayúsculas).
    }

    /**
     * Ejemplo de accesor para el atributo `contact_person`.
     * Devuelve el nombre del contacto en mayúsculas.
     */
    public function getContactPersonAttribute($value)
    {
        return strtoupper($value);
        // Convierte el nombre del contacto en mayúsculas cuando se accede a él.
    }
}
