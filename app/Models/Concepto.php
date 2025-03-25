<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    protected $fillable=['concepto', 'activo'];
    public $timestamps = false; // 👈 Desactiva created_at y updated_at
}
