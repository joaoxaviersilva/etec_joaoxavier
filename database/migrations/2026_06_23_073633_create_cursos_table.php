<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Classe que define a criação da tabela de Cursos da ETEC
return new class extends Migration
{
    /**
     * Executa as modificações no banco de dados (Criação da tabela).
     */
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            // ID autoincrementável da tabela (Chave Primária)
            $table->id();
            
            // Nome do curso técnico (ex: Desenvolvimento de Sistemas)
            $table->string('nome');
            
            // Descrição detalhada sobre o perfil profissional e o curso
            $table->text('descricao');
            
            // Período de funcionamento do curso (Matutino, Vespertino, Noturno)
            $table->string('periodo');
            
            // Duração estimada do curso (ex: 3 Semestres)
            $table->string('duracao');
            
            // Cria as colunas automáticas 'created_at' e 'updated_at' para auditoria
            $table->timestamps();
        });
    }

    /**
     * Reverte as modificações, deletando a tabela se houver um rollback.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};