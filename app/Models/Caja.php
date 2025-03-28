<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    protected $fillable=[
        'user_id', 'estado', 'fecha_apertura', 'fecha_cierre', 'inicial','cierre', 'tipo_cambio', 'monto_ingresos_soles', 'monto_ingresos_dolares', 'monto_salida_soles', 'monto_salida_dolares', 'observaciones', 'activo'
    ];

    public function movimientos(){
        return $this->hasMany(CajaMovimientos::class)
        ->where('activo', 1);
    }
}
