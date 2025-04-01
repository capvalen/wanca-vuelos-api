<?php

namespace Database\Seeders;

use App\Models\Linea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LineaSemilla extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Linea::create([ 'aerolinea' => 'Latam' ]);
        Linea::create([ 'aerolinea' => 'Avianca' ]);
        Linea::create([ 'aerolinea' => 'Sky' ]);
        Linea::create([ 'aerolinea' => 'JetSmart' ]);
        Linea::create([ 'aerolinea' => 'Aeroperú' ]);
        Linea::create([ 'aerolinea' => 'American Airlines' ]);
    }
}
