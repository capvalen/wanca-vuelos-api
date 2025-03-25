<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    protected $fillable=['destino'];
    public $timestamps = false; // 👈 Desactiva created_at y updated_at
}
