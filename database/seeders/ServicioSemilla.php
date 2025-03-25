<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSemilla extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Servicio::create([ 'servicio' => 'Restaurant' ]);
        Servicio::create([ 'servicio' => 'Hotel' ]);
        Servicio::create([ 'servicio' => 'Transporte interprovincial' ]);
        Servicio::create([ 'servicio' => 'Transporte turístico' ]);
    }
}
