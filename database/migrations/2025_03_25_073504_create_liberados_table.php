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
        Schema::create('liberados', function (Blueprint $table) {
            $table->id();
            $table->string('dni')->unique();
            $table->string('apellidos');
            $table->string('nombres');
            $table->date('caducidad')->nullable()->default(null);
            $table->foreignId('relacion_id')->constrained()->onDelete('cascade');
            $table->mediumText('direccion')->nullable()->default(null);
            $table->string('celular')->nullable()->default(null);
            $table->boolean('ficha')->default(false);
            $table->boolean('acuerdo')->default(false);
            $table->date('fecha_ficha')->nullable()->default(null);
            $table->date('fecha_acuerdo')->nullable()->default(null);
            $table->text('observaciones')->nullable()->default(null);
            $table->string('pasaporte')->nullable()->default(null);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liberados');
    }
};
