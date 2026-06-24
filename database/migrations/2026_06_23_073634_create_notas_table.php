<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Classe que cria a tabela de Notas vinculada ao sistema de autenticação do aluno
return new class extends Migration
{
    /**
     * Executa a criação da tabela de notas do Dashboard.
     */
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {
            // ID único do registro de nota
            $table->id();
            
            // Cria uma chave estrangeira ligada ao ID da tabela de usuários (users) criada pelo Breeze
            // O método onDelete('cascade') garante que se o aluno for excluído, suas notas somem junto
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Nome do componente curricular / matéria (ex: Programação Web)
            $table->string('materia');
            
            // Menção acadêmica obtida pelo aluno (ex: MB, B, R, I)
            $table->string('mencao', 2);
            
            // Registros automáticos de data de criação e atualização da nota
            $table->timestamps();
        });
    }

    /**
     * Elimina a tabela de notas se a operação sofrer rollback.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};