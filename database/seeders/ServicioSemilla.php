<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSemilla extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Servicio::truncate();

        Servicio::create([ 'servicio' => 'Restaurant' ]);
        Servicio::create([ 'servicio' => 'Hotel' ]);
        Servicio::create([ 'servicio' => 'Transporte interprovincial' ]);
        Servicio::create([ 'servicio' => 'Transporte turístico' ]);
        Servicio::create([ 'servicio' => 'Avión' ]);
        Servicio::create([ 'servicio' => 'Tren' ]);
        Servicio::create([ 'servicio' => 'Guía' ]);
        Servicio::create([ 'servicio' => 'Sitio turístico' ]);
        Servicio::create([ 'servicio' => 'Seguro de viaje' ]);
        Servicio::create([ 'servicio' => 'TC agencia' ]);
        Servicio::create([ 'servicio' => 'Otro' ]);
        Servicio::create([ 'servicio' => 'Agencia mayorista' ]);
        Servicio::create([ 'servicio' => 'Bote' ]);
    }
}
