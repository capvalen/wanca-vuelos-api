<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $fillable=['paquete', 'client_id','costo','adicional','precio','motivo', 'salida', 'regreso', 'observaciones','destino_id','moneda_id'];

    public function cliente()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function destino()
    {
        return $this->belongsTo(Destino::class);
    }
    public function cuotas(){
        return $this->hasMany(Cuota::class)
        ->where('activo', 1);
    }
    public function viajes(){
        return $this->hasMany(Viaje::class)
        ->where('activo', 1)
        ->orderBy('fecha_salida', 'asc');
    }

    public function participantes()
    {
        return $this->belongsToMany(Participante::class, 'paquete_participantes')
        ->wherePivot('activo', 1)  // 👈 Filtra por activo=1 en la pivot
        ->withPivot('id');
}

    public function proveedores(){
        return $this->belongsToMany(Proveedor::class, 'paquete_proveedors')
        ->wherePivot('activo', 1)  // 👈 Filtra por activo=1 en la pivot
        ->withPivot('id');
    }
    
    
}
