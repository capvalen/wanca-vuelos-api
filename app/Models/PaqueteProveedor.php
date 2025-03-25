<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaqueteProveedor extends Model
{
    protected $fillable= ['paquete_id', 'proveedor_id', 'activo'];
    
}
