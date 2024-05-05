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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('CPF')->unique();
            $table->dateTime('data_nascimento');
            $table->dateTime('data_cadastro');
            $table->string('telefone')->unique();
            $table->string('email')->unique();
            $table->string('cep');
            $table->string('bairro');
            $table->string('rua');
            $table->string('endereco_numero');
            $table->string('complemento');
            $table->string('estado');

            $table->string('id_responsavel');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
