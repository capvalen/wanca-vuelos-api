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
        Schema::create('caja_movimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('caja_id')->constrained()->onDelete('cascade');
            $table->foreignId('proceso_id')->constrained()->onDelete('cascade');
            $table->enum('tipo_participante', ['x','personal', 'junta'])->default('personal')->default('x');
            $table->foreignId('paquete_id')->nullable()->constrained()->onDelete('cascade')->default(null);
            $table->foreignId('participante_id')->nullable()->constrained()->onDelete('cascade')->default(null);
            $table->decimal('monto', total:10, places:2)->default(0);
            $table->foreignId('moneda_id')->constrained()->onDelete('cascade');
            $table->foreignId('banco_id')->nullable()->constrained()->onDelete('cascade')->default(null);
            $table->enum('cuenta', ['x', 'Nery', 'Tradition', 'Christian'])->default('x');
            $table->decimal('tipo_cambio', total:10, places:2)->nullable()->default(0);
            $table->string('num_operacion')->nullable();
            $table->date('fecha_deposito')->nullable()->default(null);
            $table->string('observaciones')->nullable()->default(null);;
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caja_movimientos');
    }
};
