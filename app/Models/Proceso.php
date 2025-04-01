<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    protected $fillable=['proceso', 'descripcion_larga', 'operacion','activo'];
    public $timestamps = false; // 👈 Desactiva created_at y updated_at
}
