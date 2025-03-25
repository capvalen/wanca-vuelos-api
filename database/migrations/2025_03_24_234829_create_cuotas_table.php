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
        Schema::create('cuotas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paquete_id')->default(1)->constrained('paquetes')->onDelete('cascade');
            $table->decimal('monto', total:10, places:2)->default(0);
            $table->date('desde')->nullable()->default(null);
            $table->date('hasta')->nullable()->default(null);
            $table->tinyInteger('activo')->default(1) ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuotas');
    }
};
