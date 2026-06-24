<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;  // [IMPORTANTE] Importa o modelo de Cursos conectado à tabela 'cursos'
use App\Models\Evento; // [IMPORTANTE] Importa o modelo de Eventos conectado à tabela 'eventos'

// Controlador principal conectado diretamente ao Banco de Dados da ETEC Zona Leste
class EtecController extends Controller
{
    /**
     * Retorna a View da página Home (Página Inicial pública).
     */
    public function home()
    {
        // Retorna o arquivo blade estático da Home, sem necessidade de dados do banco
        return view('home');
    }

    /**
     * Busca as informações de cursos direto do MySQL e injeta na View.
     */
    public function cursos()
    {
        // Algoritmo Eloquent: Executa um 'SELECT * FROM cursos' automaticamente no banco de dados
        $cursos = Curso::all();

        // Passa a coleção de registros reais vindos do banco para a view correspondente
        return view('cursos', compact('cursos'));
    }

    /**
     * Busca o cronograma de eventos direto do MySQL e injeta na View.
     */
    public function eventos()
    {
        // Algoritmo Eloquent: Executa um 'SELECT * FROM eventos' no banco de dados
        $eventos = Evento::all();

        // Passa a lista de eventos reais para a view de renderização do Blade
        return view('eventos', compact('eventos'));
    }
}