<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    protected $fillable=['aerolinea'];
    public $timestamps = false; // 👈 Desactiva created_at y updated_at
}
