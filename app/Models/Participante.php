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
}
