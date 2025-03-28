<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class CajaMovimientos extends Model
{
    protected $fillable=['caja_id',
        'proceso_id',
        'monto',
        'moneda_id',
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
}
