<?php

namespace Database\Seeders;

use App\Models\Destino;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinoSemilla extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destino::create([ 'destino' => 'Sin destino' ]);
        Destino::create([ 'destino' => 'Lima' ]);
        Destino::create([ 'destino' => 'Huancayo' ]);
        Destino::create([ 'destino' => 'Cuzco' ]);
        Destino::create([ 'destino' => 'Puno' ]);
    }
}
