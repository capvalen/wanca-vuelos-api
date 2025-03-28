<?php

namespace Database\Seeders;

use App\Models\Proceso;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcesoSemilla extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proceso::create([ 'proceso' => 'Ingreso' ]);
        Proceso::create([ 'proceso' => 'Salida' ]);
        Proceso::create([ 'proceso' => 'Pago contribución' ]);
    }
}
