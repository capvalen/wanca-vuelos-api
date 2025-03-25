<?php

namespace Database\Seeders;

use App\Models\Moneda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonedaSemilla extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Moneda::create([ 'moneda' => 'Soles' ]);
        Moneda::create([ 'moneda' => 'Dólares' ]);
    }
}
