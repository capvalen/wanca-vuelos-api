<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable=['servicio', 'activo'];
    public $timestamps = false; // 👈 Desactiva created_at y updated_at
}
