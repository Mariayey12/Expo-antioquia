<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',  // example field
        'contact_person',  // example field
    ];

    // Polymorphic relation to User
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
