<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relacion extends Model
{
    protected $fillable=['relacion','activo'];
    public $timestamps = false; // 👈 Desactiva created_at y updated_at

    /* public function parentezco()
    {
        return $this->belongsTo(Liberado::class, 'liberado_id');
    } */
}
