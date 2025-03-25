<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    protected $fillable= ['paquete_id', 'fecha_salida', 'ciudad_salida', 'fecha_llegada', 'ciudad_llegada', 'activo'];
}
