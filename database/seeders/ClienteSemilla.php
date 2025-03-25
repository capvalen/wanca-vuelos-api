<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSemilla extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([ 'ruc' => '20602337147', 'razon' => 'Infocat soluciones' ]);
        Client::create([ 'ruc' => '42029239', 'razon' => 'CARRANZA GUTIERREZ, PEDRO ROBERTO' ]);
        Client::create([ 'ruc' => '20100120152', 'razon' => 'COMPAÑIA MINERA QUIRUVILCA S.A. EN LIQUIDACION' ]);
    }
}
