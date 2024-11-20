<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;

    // Especificamos la tabla si no sigue la convención
    protected $table = 'anuncios';

    // Atributos que son asignables masivamente
    protected $fillable = [
        'area',
        'categoria',
        'provincia',
        'localidad',
        'direccion',
        'cod_postal',
        'titulo',
        'contenido',
        'precio',
        'autor',
        'imagen_url',
        'link_externo',
        'nombre',
        'email',
        'telefono',
        'acepto_condiciones',
        'fecha_publicacion',
    ];

    // Si las fechas como 'fecha_publicacion' deben ser tratadas como tipo date
    protected $dates = ['fecha_publicacion'];
}
