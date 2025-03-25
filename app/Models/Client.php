<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['ruc', 'razon', 'observaciones', 'activo'];
    protected $attributes = [
        'activo' => 1 // Valor por defecto a nivel de modelo
    ];

    public function paquetes()
    {
        return $this->hasMany(Paquete::class);
    }
}
