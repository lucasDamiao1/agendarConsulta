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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_paciente');
            $table->foreign('id_paciente')->references('id')->on('pacientes')->cascadeOnDelete()->cascadeOnUpdate();

            $table->unsignedBigInteger('id_medico');
            $table->foreign('id_medico')->references('id')->on('medicos')->cascadeOnDelete()->cascadeOnUpdate();

            $table->dateTime('data_consulta');
            $table->dateTime('data_agendamento');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
