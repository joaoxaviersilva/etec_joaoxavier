<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;  // Importa o modelo de Cursos para permitir a inserção
use App\Models\Evento; // Importa o modelo de Eventos para permitir a inserção

class EtecSeeder extends Seeder
{
    /**
     * Executa as inserções automáticas de dados nas tabelas do MySQL.
     */
    public function run(): void
    {
        // Insere os Cursos Técnicos na tabela 'cursos'
        Curso::create([
            'nome' => 'Desenvolvimento de Sistemas',
            'descricao' => 'Aprenda a analisar, projetar e desenvolver sistemas computacionais utilizando as tecnologias mais modernas do mercado.',
            'periodo' => 'Tarde / Noite',
            'duracao' => '3 Semestres'
        ]);

        Curso::create([
            'nome' => 'Administração',
            'descricao' => 'Capacita o estudante para atuar no planejamento, organização e controle das rotinas operacionais e estratégicas de uma empresa.',
            'periodo' => 'Manhã / Noite',
            'duracao' => '3 Semestres'
        ]);

        Curso::create([
            'nome' => 'Logística',
            'descricao' => 'Focado na gestão de transporte, armazenamento, distribuição e cadeia de suprimentos com máxima eficiência operacional.',
            'periodo' => 'Noite',
            'duracao' => '3 Semestres'
        ]);

        // Insere os Eventos institucionais na tabela 'eventos'
        Evento::create([
            'titulo' => 'Semana Paulo Freire',
            'descricao' => 'Apresentação de projetos interdisciplinares, workshops de tecnologia e atividades culturais organizadas pelos alunos.',
            'data_evento' => '2026-10-12 19:00:00',
            'local' => 'Auditório Principal'
        ]);

        Evento::create([
            'titulo' => 'Vestibulinho ETEC 2027',
            'descricao' => 'Abertura oficial do período de inscrições para os novos cursos técnicos e ensinos médios integrados.',
            'data_evento' => '2026-11-05 08:00:00',
            'local' => 'Secretaria e Site Oficial'
        ]);

        Evento::create([
            'titulo' => 'Feira de Profissões e Tecnologia',
            'descricao' => 'Encontro com empresas da região da Zona Leste para apresentar os perfis profissionais e oportunidades de Jovem Aprendiz.',
            'data_evento' => '2026-11-25 14:00:00',
            'local' => 'Quadra Poliesportiva'
        ]);
    }
}