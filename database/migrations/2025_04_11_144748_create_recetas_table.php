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
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
        });

        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_paciente')->constrained('users');
            $table->foreignId('id_medicamento')->constrained('medicamentos');
            $table->integer('cantidad');
            $table->string('unidad')->nullable();
            $table->integer('intervalo')->default(8);
            $table->timestamps();
        });

        Schema::create('dosis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_receta')->constrained('recetas');
            $table->timestamps();
            $table->boolean('confirmado')->default(true);
            $table->boolean('confirmado_familiar')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamentos');
        Schema::dropIfExists('recetas');
        Schema::dropIfExists('dosis');
    }
};
