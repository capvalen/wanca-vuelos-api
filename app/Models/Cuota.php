<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    protected $fillable=['monto', 'desde', 'hasta', 'paquete_id', 'activo'];

    public function paquete(){
        return $this->belongsTo(Paquete::class, 'paquete_id');
    }
}
