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
        Schema::create('destinos', function (Blueprint $table) {
            $table->id();
            $table->string('destino')->unique();
            $table->tinyInteger('activo')->default(1) ->nullable(); // Es nulo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinos');
    }
};
