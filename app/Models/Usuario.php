<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Testing\Fluent\Concerns\Has;

class Usuario extends Model
{

    use HasFactory;
    
    protected $fillable = ['nombre'];

    public function coches()
    {
        return $this->hasMany(Coche::class);
    }

    public function motos()
    {
        return $this->hasMany(Moto::class);
    }
}
