<?php

namespace Database\Seeders;

use App\Models\Banco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BancoSemilla extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banco::create([ 'entidad' => 'Ningún banco' ]);
        Banco::create([ 'entidad' => 'BCP' ]);
        Banco::create([ 'entidad' => 'BBVA' ]);
        Banco::create([ 'entidad' => 'Interbank' ]);
    }
}
