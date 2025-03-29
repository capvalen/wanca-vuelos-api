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
        Proceso::create([ 'proceso' => 'Ingreso', 'descripcion_larga' => 'Ingreso' ]);
        Proceso::create([ 'proceso' => 'Salida', 'descripcion_larga' => 'Salida' ]);
        Proceso::create([ 'proceso' => 'Pago de cuota', 'descripcion_larga' => 'Pago de cuota de viaje contratado por mí y por la junta directiva' ]);
        Proceso::create([ 'proceso' => 'Adelanto para participante', 'descripcion_larga' => 'Adelanto para viaje contratado por mí y por la junta directiva' ]);
        Proceso::create([ 'proceso' => 'Adelanto por junta directiva', 'descripcion_larga' => 'Adelanto de pago de Junta directiva para viaje contrado del cliente del participante' ]);
        Proceso::create([ 'proceso' => 'Pago por diferencia diferencia', 'descripcion_larga' => 'Pago por diferencia tarifaria por inscripción extemporánea  del participante a viaje contratado por la junta directiva del cliente' ]);
        Proceso::create([ 'proceso' => 'Recaudación de viaje al exterior', 'descripcion_larga' => 'Recaudación para el pago de certificación de autorización de viaje al exterior en el colegio notarios de Junín' ]);
        Proceso::create([ 'proceso' => 'Pago de penalidad', 'descripcion_larga' => 'Pago de penalidad por incumplimiento en fecha de pago según contrato' ]);
        Proceso::create([ 'proceso' => 'Pago de última cuota', 'descripcion_larga' => 'Última cuota para viaje contratado, cancelado el total del paquete' ]);
        Proceso::create([ 'proceso' => 'Pago de otros', 'descripcion_larga' => '']);
    }
}
