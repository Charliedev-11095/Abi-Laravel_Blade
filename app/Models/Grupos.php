<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupos extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'grado',
        'seccion',
        'turno',
        'estado',
    ];




}
