<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Classe responsável por criar a tabela de Eventos da unidade ETEC
return new class extends Migration
{
    /**
     * Executa a criação da tabela de eventos institucionais.
     */
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            // ID único do evento (Chave Primária)
            $table->id();
            
            // Título principal do evento (ex: Semana Paulo Freire)
            $table->string('titulo');
            
            // Descrição detalhada ou cronograma de atividades
            $table->text('descricao');
            
            // Armazena a data e o horário em que o evento ocorrerá
            $table->dateTime('data_evento');
            
            // Local onde será realizado o evento (ex: Auditório, Quadra Coberta)
            $table->string('local');
            
            // Registra automaticamente as datas de criação e modificação do registro
            $table->timestamps();
        });
    }

    /**
     * Remove a tabela de eventos caso a migration seja revertida.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};