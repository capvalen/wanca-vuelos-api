<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaqueteLiberados extends Model
{
    protected $fillable= ['paquete_id', 'liberado_id', 'activo'];
}
