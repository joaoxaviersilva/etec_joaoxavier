<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Modelo responsável por fazer a ponte com a tabela 'notas' no MySQL
class Nota extends Model
{
    /**
     * Propriedade $fillable (Atribuição em Massa).
     * Define estritamente quais campos do banco de dados têm permissão
     * para serem preenchidos através do método dinâmico Nota::create().
     */
    protected $fillable = [
        'user_id', // ID do Aluno dono da nota
        'materia', // Nome do Componente Curricular
        'mencao',  // Conceito Final (MB, B, R, I)
    ];

    /**
     * Relacionamento Inverso (Muitos-para-Um).
     * Indica que uma nota pertence especificamente a um único usuário/aluno.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}