<?php

namespace Database\Seeders;

use App\Models\Relacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RelacionSemilla extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Relacion::create([ 'relacion' => 'Sin relación' ]);
        Relacion::create([ 'relacion' => 'Padre de familia' ]);
        Relacion::create([ 'relacion' => 'Apoderado' ]);
        Relacion::create([ 'relacion' => 'Director' ]);
        Relacion::create([ 'relacion' => 'Sub-Director' ]);
        Relacion::create([ 'relacion' => 'Docente' ]);
    }
}
