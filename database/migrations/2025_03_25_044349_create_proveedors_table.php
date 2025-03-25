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
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->foreignId('destino_id')->constrained()->onDelete('cascade');
            $table->foreignId('servicio_id')->constrained()->onDelete('cascade');
            $table->foreignId('concepto_id')->constrained()->onDelete('cascade');
            $table->date('inicio')->nullable()->default(null);
            $table->date('final')->nullable()->default(null);
            $table->string('contacto')->nullable()->default(null);
            $table->text('observaciones')->nullable()->default(null);
            $table->tinyInteger('activo')->default(1) ->nullable(); // Es nulo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedors');
    }
};
