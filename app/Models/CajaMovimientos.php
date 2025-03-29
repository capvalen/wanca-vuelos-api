<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class CajaMovimientos extends Model
{
    protected $fillable=['caja_id',
        'proceso_id',
        'tipo_participante',
        'paquete_id',
        'participante_id',
        'monto',
        'moneda_id',
        'banco_id',
        'cuenta',
        'tipo_cambio',
        'num_operacion',
        'fecha_deposito',
        'observaciones', 'activo'
    ];
    protected $appends = ['proceso_nombre'];

    public function proceso(){
        return $this->belongsTo(Proceso::class);
    }

    protected function procesoNombre(): Attribute
    {
        return Attribute::get(fn() => $this->proceso?->proceso);
    }
    public function participante(){
        return $this->belongsTo(Participante::class)->withDefault(); //evitar errores de null
    }
}
