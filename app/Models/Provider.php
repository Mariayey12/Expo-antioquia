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

    // Relación polimórfica con el usuario
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

 // Relación con categorías
 public function categories()
 {
     return $this->hasMany(Category::class);
 }
    /**
     * Relación Polimórfica con los Servicios.
     * Un proveedor puede ofrecer muchos servicios a través de una relación polimórfica.
     */
    public function services()
    {
        return $this->morphMany(Service::class, 'serviceable');
    }

    /**
     * Relación Polimórfica con los Productos.
     * Un proveedor puede ofrecer muchos productos, también a través de una relación polimórfica.
     */
    public function products()
    {
        return $this->morphMany(Product::class, 'userable');
    }

    /**
     * Relación con categorías.
     * Un proveedor puede tener muchas categorías asociadas.
     */
    

    /**
     * Relación con lugares.
     * Un proveedor puede tener muchos lugares asociados.
     */
    public function places()
    {
        return $this->hasMany(Place::class);
    }

    /**
     * Relación con anuncios.
     * Un proveedor puede tener muchos anuncios a través de una relación polimórfica.
     */
    public function ads()
    {
        return $this->morphMany(Ad::class, 'advertisable');
    }

    /**
     * Relación con reservas (a través de los lugares).
     * Un proveedor puede tener muchas reservas a través de sus lugares.
     */
    public function reservations()
    {
        return $this->hasManyThrough(Reservation::class, Place::class);
    }

    /**
     * Relación con bookings.
     * Un proveedor puede tener muchas reservas (bookings).
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Relación con usuarios (a través de reservas).
     * Un proveedor puede estar relacionado con muchos usuarios a través de las reservas.
     */
    public function users()
    {
        return $this->hasManyThrough(User::class, Reservation::class);
    }

    /**
     * Relación polimórfica con eventos.
     * Un proveedor puede estar relacionado con muchos eventos.
     */
    public function events()
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    /**
     * Relación polimórfica con gastronomía.
     * Un proveedor puede estar relacionado con muchos elementos gastronómicos.
     */
    public function gastronomies()
    {
        return $this->morphMany(Gastronomy::class, 'gastronomiceable');
    }

    /**
     * Ejemplo de búsqueda personalizada.
     * Este método permite encontrar proveedores por nombre utilizando una búsqueda parcial.
     */
    public function scopeByName($query, $name)
    {
        return $query->where('name', 'like', "%{$name}%");
    }

    /**
     * Ejemplo de mutador para el atributo `name`.
     * Convierte el nombre a formato capitalizado.
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }

    /**
     * Ejemplo de accesor para el atributo `contact_person`.
     * Devuelve el nombre del contacto en mayúsculas.
     */
    public function getContactPersonAttribute($value)
    {
        return strtoupper($value);
    }
}

