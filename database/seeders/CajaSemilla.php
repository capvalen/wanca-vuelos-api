<?php

namespace Database\Seeders;
use App\Models\Caja;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CajaSemilla extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Caja::create([
            'user_id' => 1,
            'estado' => 'abierta',
            'fecha_apertura' => '2025-01-01 12:00:00',
            'inicial'=> 0,
            
        ]);
    }
}
