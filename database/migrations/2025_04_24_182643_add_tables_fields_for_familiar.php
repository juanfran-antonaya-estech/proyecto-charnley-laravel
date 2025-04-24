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
        Schema::table('users', function (Blueprint $table){
            $table->foreignId('taking_care_of')->nullable()->after('role')->constrained('users')->onDelete('cascade');
        });

        Schema::table('salas', function (Blueprint $table){
            $table->boolean('visible_by_familiar')->default(false)->after('id_paciente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function (Blueprint $table){
            $table->dropForeign(['taking_care_of']);
            $table->dropColumn('taking_care_of');
        });
        Schema::table('salas', function (Blueprint $table){
            $table->dropColumn('visible_by_familiar');
        });
    }
};
