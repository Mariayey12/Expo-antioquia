<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userable extends Model
{
    use HasFactory; // No olvides incluir HasFactory si planeas usar fábricas

    protected $fillable = ['user_id', 'userable_type', 'userable_id'];

    /**
     * Relación con el modelo User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación polimórfica con el modelo relacionado.
     * Esto permite que Userable se relacione con otros modelos.
     */
    public function userable()
    {
        return $this->morphTo();
    }
}
