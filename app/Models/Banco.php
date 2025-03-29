<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $fillable=['entidad'];
    public $timestamps = false; // 👈 Desactiva created_at y updated_at
}
