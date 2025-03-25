<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liberado extends Model
{
    protected $fillable = [
        'dni',
        'apellidos',
        'nombres',
        'caducidad',
        'relacion_id',
        'direccion',
        'celular',
        'ficha',
        'acuerdo',
        'pasaporte',
        'observaciones',
        'fecha_ficha',
        'fecha_acuerdo',
        'activo',
    ];
}
