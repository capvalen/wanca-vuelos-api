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
        Schema::create('cajas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('estado', ['abierta', 'cerrada'])->default('abierta');
            $table->dateTime('fecha_apertura')->nullable()->default(null);
            $table->dateTime('fecha_cierre')->nullable()->default(null);
            $table->decimal('inicial', total:10, places:2)->default(0);
            $table->decimal('cierre', total:10, places:2)->nullable()->default(0);
            $table->decimal('tipo_cambio', total:10, places:2)->nullable()->default(0);
            $table->decimal('monto_ingresos_soles', total:10, places:2)->nullable()->default(0);
            $table->decimal('monto_ingresos_dolares', total:10, places:2)->nullable()->default(0);
            $table->decimal('monto_salida_soles', total:10, places:2)->nullable()->default(0);
            $table->decimal('monto_salida_dolares', total:10, places:2)->nullable()->default(0);
            $table->text('observaciones')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cajas');
    }
};
