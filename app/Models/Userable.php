<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Userable extends Model
{
    protected $fillable = ['user_id', 'userable_type', 'userable_id'];

    // Opcional: relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Opcional: relación polimórfica
    public function userable()
    {
        return $this->morphTo();
    }
}
