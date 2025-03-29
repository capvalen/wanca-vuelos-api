<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Aportacion extends Model
{
    protected $fillable = ['caja_movimientos_id',
        'fecha',
        'proceso_id',
        'tipo_participante',
        'paquete_id',
        'participante_id',
        'monto',
        'moneda_id',
        'tipo_cambio',
        'observaciones', 
        'activo'
    ];
    protected $appends = ['participante_nombre', 'proceso_corto'];

    
    public function participante(){
        return $this->belongsTo(Participante::class); //evitar errores de null ->withDefault()
    }

    protected function participanteNombre(): Attribute
    {
        return Attribute::get(fn() => $this->participante?->apellidos.' '.$this->participante?->nombres);
    }

    public function proceso(){
        return $this->belongsTo(Proceso::class);
    }
    public function procesoCorto(): Attribute
    {
        return Attribute::get(fn() => $this->proceso?->proceso);
    }


}
