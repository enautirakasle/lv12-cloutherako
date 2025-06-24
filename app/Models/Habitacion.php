<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $fillable = [
        'casa_id',
        'nombre',
    ];

    public function casa()
    {
        return $this->belongsTo(Casa::class);
    }
}
