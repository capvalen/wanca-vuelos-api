<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    protected $fillable=['moneda'];
    public $timestamps = false; // 👈 Desactiva created_at y updated_at
}
