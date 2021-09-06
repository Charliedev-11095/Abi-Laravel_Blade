<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupo_alumnos extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'grupos_id',
        'alumnos_id',
        'entrenadores_id',
      
    ];

}
