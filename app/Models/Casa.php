<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{
    protected  $fillable = [
        'direccion',
        'habitaciones',
    ];
}
