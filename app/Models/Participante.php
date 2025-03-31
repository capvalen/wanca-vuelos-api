<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $fillable = [
        'apellidos', 'nombres', 'dni', 'caducidad', 'celular', 'ficha', 'acuerdo', 'copia_papa', 'copia_mama', 'direccion', 'observaciones', 'fecha_ficha', 'fecha_acuerdo', 'fecha_copia_papa', 'fecha_copia_mama', 'pasaporte', 'activo'
    ];

    public function paquetes()
    {
        return $this->belongsToMany(Paquete::class, 'paquete_participante')
            ->withTimestamps(); // si usas timestamps en la tabla pivote
            //->withPivot(['rol', 'cantidad']); // si agregaste campos adicionales
    }

    public function documentos(){
        return $this->hasMany(ParticipanteDocumentos::class);
    }


    /* public function participantes()
    {
        return $this->belongsToMany(Participante::class, 'paquete_participantes')
        ->wherePivot('activo', 1)  // 👈 Filtra por activo=1 en la pivot
        ->withPivot('id');
    } */
}
