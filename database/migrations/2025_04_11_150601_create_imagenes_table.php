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
        Schema::create('imagenes', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->foreignId('id_imagen_original')->nullable()->constrained('imagenes')->onDelete('cascade');
            $table->foreignId('id_paciente')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('subimagenes', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->foreignId('id_imagen')->constrained('imagenes')->onDelete('cascade');
            $table->string('objeto');
            $table->double('seguridad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes');
        Schema::dropIfExists('subimagenes');
    }
};
