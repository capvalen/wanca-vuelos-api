<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable=['documento', 'pertenencia', 'activo'];
    public $timestamps = false; // 👈 Desactiva created_at y updated_at
}
