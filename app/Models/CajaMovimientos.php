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
    protected $appends = ['proceso_nombre', 'nombre_banco', 'nombre_participante', 'nombre_paquete'];

    public function proceso(){
        return $this->belongsTo(Proceso::class);
    }
    public function paquete(){
        return $this->belongsTo(Paquete::class);
    }

    protected function procesoNombre(): Attribute
    {
        return Attribute::get(fn() => $this->proceso?->proceso);
    }
    public function participante(){
        return $this->belongsTo(Participante::class)->withDefault(); //evitar errores de null
    }
    public function banco(){
        return $this->belongsTo(Banco::class)->withDefault();
    }
    protected function nombreBanco():Attribute
    {
        return Attribute::get(fn() => $this->banco?->entidad);
    }
    protected function nombreParticipante():Attribute
    {
        return Attribute::get(fn() => trim($this->participante?->apellidos . ' ' . $this->participante?->nombre));
    }
    protected function nombrePaquete():Attribute
    {
        return Attribute::get(fn() => trim($this->paquete?->paquete));
    }
}
