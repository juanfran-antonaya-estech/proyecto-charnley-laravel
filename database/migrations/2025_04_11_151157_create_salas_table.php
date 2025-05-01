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
        Schema::create('salas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_img_asociada')->constrained('imagenes');
            $table->foreignId('id_paciente')->constrained('users');
            $table->timestamps();
        });

        Schema::create('sala_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sala_id')->constrained('salas');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });

        Schema::create('mensajes', function (Blueprint $table) {
           $table->id();
           $table->foreignId('id_sala')->constrained('salas');
           $table->foreignId('id_sender')->constrained('users');
           $table->string('content');
           $table->tinyInteger('state')->default(0); // 0 = no ha llegado, 1 = Entregado, 2 = leído
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salas');
    }
};
