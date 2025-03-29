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
        Schema::create('aportacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('caja_movimientos_id')->constrained()->onDelete('cascade');
            $table->date('fecha')->nullable()->default(null);
            $table->foreignId('proceso_id')->constrained()->onDelete('cascade');
            $table->enum('tipo_participante', ['x','personal', 'junta'])->default('personal')->default('x');
            $table->foreignId('paquete_id')->nullable()->constrained()->onDelete('cascade')->default(null);
            $table->foreignId('participante_id')->nullable()->constrained()->onDelete('cascade')->default(null);
            $table->decimal('monto', total:10, places:2)->default(0);
            $table->foreignId('moneda_id')->constrained()->onDelete('cascade');
            $table->decimal('tipo_cambio', total:10, places:2)->nullable()->default(0);
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
        Schema::dropIfExists('aportacions');
    }
};
