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
        Schema::create('paquetes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->default(1)->constrained('clients')->onDelete('cascade');
            $table->string('paquete');
            $table->decimal('costo', total:10, places:2)->default(0);
            $table->decimal('adicional', total:10, places:2)->default(0);
            $table->decimal('precio', total:10, places:2)->default(0);
            $table->string('motivo')->nullable();
            $table->string('observaciones')->nullable();            
            $table->foreignId('moneda_id')->default(1)->constrained('monedas')->onDelete('cascade');
            $table->foreignId('destino_id')->default(1)->constrained('destinos')->onDelete('cascade');
            $table->date('salida')->nullable()->default(null);
            $table->date('regreso')->nullable()->default(null);
            $table->tinyInteger('activo')->default(1)->nullable(); // Es nulo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paquetes');
    }
};
