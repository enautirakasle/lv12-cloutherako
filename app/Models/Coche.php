<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coche extends Model
{

    use HasFactory;

    protected $fillable = ['matricula', 'usuario_id'];
    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
