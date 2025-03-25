<?php

namespace Database\Seeders;

use App\Models\Concepto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConceptoSemilla extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Concepto::create([ 'concepto' => 'Alojamiento' ]);
        Concepto::create([ 'concepto' => 'Desayuno' ]);
        Concepto::create([ 'concepto' => 'Cena' ]);
        Concepto::create([ 'concepto' => 'Almuerzo' ]);
        Concepto::create([ 'concepto' => 'Ruta de transporte terrestre' ]);
        Concepto::create([ 'concepto' => 'Ruta de transporte turístico' ]);
        Concepto::create([ 'concepto' => 'Ruta de transporte aéreo' ]);
    }
}
