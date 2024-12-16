<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    public function users()
    {
        return $this->morphToMany(User::class, 'userable');
    }
    // Relación polimórfica inversa
    public function commentable()
    {
        return $this->morphTo();
    }
}
