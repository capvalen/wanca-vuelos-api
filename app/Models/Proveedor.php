<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Proveedor extends Model
{
    protected $fillable=['nombre','destino_id','servicio_id','concepto_id','inicio','final','contacto','observaciones','activo'];
    protected $appends = ['destino_nombre', 'servicio_nombre', 'concepto_nombre']; // 👈 Agregar "destino_nombre" a la salida JSON
    //protected $appends = ['ciudad']; // 👈 Agregar "ciudad" a la salida JSON

    public function destino(){
        return $this->belongsTo(Destino::class);
    }

    // Accessor para "ciudad"
    //protected function ciudad(): Attribute
    
    //accesor para "destino_nombre" en camell case
    protected function destinoNombre(): Attribute
    {
        return Attribute::get(fn() => $this->destino?->destino);
    }

    public function servicio(){
        return $this->belongsTo(Servicio::class);
    }

    public function servicioNombre(): Attribute
    {
        return Attribute::get(fn() => $this->servicio?->servicio);
    }

    public function concepto(){
        return $this->belongsTo(Concepto::class);
    }

    public function conceptoNombre(): Attribute
    {
        return Attribute::get(fn() => $this->concepto?->concepto);
    }

    
}
