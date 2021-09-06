<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumnos extends Model
{
    protected $fillable=[
       'nombres',
        'apellido_paterno',
        'apellido_materno',
        'calle',
        'numero_interior',
        'numero_exterior',
        'colonia',
        'ciudad',
        'estado',
        'codigo_postal',
        'curp',
        'fecha_de_nacimiento',
        'telefono',
    ];
    protected $table='alumnos';
}
