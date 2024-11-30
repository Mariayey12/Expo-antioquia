<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'company_name',
        'services',
    ];

    // Relación polimórfica con User
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
