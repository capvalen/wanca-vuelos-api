<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaqueteParticipante extends Model
{
    protected $fillable= ['paquete_id', 'participante_id', 'activo'];
}
