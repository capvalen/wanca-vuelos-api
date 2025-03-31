<?php

namespace Database\Seeders;

use App\Models\Documento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentoSemilla extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //documentos del cliente
        Documento::create([ 'documento' => 'Resolución de colegio', 'pertenencia' => 'cliente' ]);
        Documento::create([ 'documento' => 'Nómina de matrícula', 'pertenencia' => 'cliente' ]);
        Documento::create([ 'documento' => 'Relación de participante en hoja membretada', 'pertenencia' => 'cliente' ]);
        Documento::create([ 'documento' => 'Copia legalizada DNI del Director del colegio', 'pertenencia' => 'cliente' ]);
        Documento::create([ 'documento' => 'Copia legalizada DNI del Profesor encargado', 'pertenencia' => 'cliente' ]);
        Documento::create([ 'documento' => 'Formato con firma legalizada desde Perú Rail', 'pertenencia' => 'cliente' ]);
        Documento::create([ 'documento' => 'Copia simple del liberado #1', 'pertenencia' => 'cliente' ]);
        Documento::create([ 'documento' => 'Copia simple del liberado #2', 'pertenencia' => 'cliente' ]);
        Documento::create([ 'documento' => 'Copia de documentos de participante', 'pertenencia' => 'cliente' ]);
        Documento::create([ 'documento' => 'Entregado por', 'pertenencia' => 'cliente' ]);
        Documento::create([ 'documento' => 'Dni de quien entrega', 'pertenencia' => 'cliente' ]);

        //documentos de la persona
        Documento::create([ 'documento' => 'Copia pasaporte participante', 'pertenencia' => 'participante' ]);
        Documento::create([ 'documento' => 'Copia DNI participante', 'pertenencia' => 'participante' ]);
        Documento::create([ 'documento' => 'Copia DNI Papá', 'pertenencia' => 'participante' ]);
        Documento::create([ 'documento' => 'Copia DNI Mamá', 'pertenencia' => 'participante' ]);
        Documento::create([ 'documento' => 'Copia DNI ambos', 'pertenencia' => 'participante' ]);
        Documento::create([ 'documento' => 'Autorización de viaje', 'pertenencia' => 'participante' ]);
        Documento::create([ 'documento' => 'Copia legalizada de auto', 'pertenencia' => 'participante' ]);
        Documento::create([ 'documento' => 'Ficha de inscripción', 'pertenencia' => 'participante' ]);
        Documento::create([ 'documento' => 'Acuerdo de pago', 'pertenencia' => 'participante' ]);
        Documento::create([ 'documento' => 'Compromiso de buen comportamiento', 'pertenencia' => 'participante' ]);
        Documento::create([ 'documento' => 'Pago por certificación autorización', 'pertenencia' => 'participante' ]);
        Documento::create([ 'documento' => 'Autorización Demeron 1', 'pertenencia' => 'participante' ]);
        Documento::create([ 'documento' => 'Autorización Demeron 2', 'pertenencia' => 'participante' ]);
        Documento::create([ 'documento' => 'Otro', 'pertenencia' => 'participante' ]);
    }
}
