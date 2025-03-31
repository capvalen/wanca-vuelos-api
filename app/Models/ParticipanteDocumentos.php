<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class ParticipanteDocumentos extends Model
{
    protected $fillable = ['participante_id', 'documento_id', 'fecha', 'entregado', 'extra'];
    protected $appends = ['nombre_documento'];

    public function documento(){
        return $this->belongsTo(Documento::class);
    }

    public function nombreDocumento(): Attribute
    {
        return Attribute::get(fn() => $this->documento?->documento);
    }
}
