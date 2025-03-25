<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paquete_id')->default(1)->constrained('paquetes')->onDelete('cascade');
            $table->string('fecha_salida')->nullable()->default(null);
            $table->string('ciudad_salida');
            $table->string('fecha_llegada')->nullable()->default(null);
            $table->string('ciudad_llegada');
            $table->tinyInteger('activo')->default(1) ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viajes');
    }
};
