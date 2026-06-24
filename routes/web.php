<?php

use App\Http\Controllers\EtecController;
use App\Http\Controllers\ProfileController;
use App\Models\Nota; // [IMPORTANTE] Importa o modelo de Nota para conectar à tabela do banco
use Illuminate\Support\Facades\Auth; // [IMPORTANTE] Importa a Facade de Autenticação para ler o usuário logado
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes (Rotas da Aplicação ETEC)
|--------------------------------------------------------------------------
| Aqui registramos todas as URLs que o usuário poderá acessar no navegador.
*/

// [Rotas Públicas] - Gerenciadas pelo EtecController buscando dados reais do MySQL
Route::get('/', [EtecController::class, 'home'])->name('home');
Route::get('/cursos', [EtecController::class, 'cursos'])->name('cursos');
Route::get('/eventos', [EtecController::class, 'eventos'])->name('eventos');

// [Rota do Dashboard Administrativo/Notas] - Protegida por autenticação (Breeze) e dinâmica com o Banco de Dados
// O middleware 'auth' garante que apenas alunos devidamente logados acessem essa tela privada
Route::get('/dashboard', function () {
    // Recupera o objeto completo do usuário/aluno que está atualmente logado na sessão do navegador
    $user = Auth::user();

    // Algoritmo de Busca: Acessa o relacionamento Eloquent e traz todas as notas deste usuário direto do MySQL
    $notas = $user->notas;

    // Se o aluno acabou de se cadastrar no sistema e a tabela de notas dele no banco estiver totalmente vazia...
    if ($notas->isEmpty()) {
        // Algoritmo Eloquent: Cria os registros físicos na tabela 'notas' vinculados automaticamente ao ID deste aluno
        Nota::create(['user_id' => $user->id, 'materia' => 'Programação Web I', 'mencao' => 'MB']);
        Nota::create(['user_id' => $user->id, 'materia' => 'Banco de Dados II', 'mencao' => 'B']);
        Nota::create(['user_id' => $user->id, 'materia' => 'Análise e Modelagem de Sistemas', 'mencao' => 'MB']);
        Nota::create(['user_id' => $user->id, 'materia' => 'Sistemas Operacionais e Redes', 'mencao' => 'MB']);
        
        // Atualiza a variável buscando novamente os dados agora que eles foram gravados e salvos no MySQL
        $notas = $user->refresh()->notas;
    }
    
    // Retorna a view de dashboard customizada injetando a coleção de notas reais extraídas do banco de dados
    return view('dashboard', compact('notas'));
})->middleware(['auth', 'verified'])->name('dashboard');

// [Grupo de Rotas do Perfil] - Permite que o usuário logado edite seus dados cadastrais internos
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// [Requisito Obrigatório: Rota Fallback]
// Se o usuário digitar qualquer URL inexistente ou errada no navegador, o Laravel ativa esta lógica de proteção
Route::fallback(function () {
    // Retorna a view customizada amigável da ETEC informando o erro de página 404
    return view('404');
});

// Importa os arquivos de rotas estruturados automaticamente pelo mecanismo do Breeze (telas de login, cadastro e rotas de logout)
require __DIR__.'/auth.php';