{{-- 
    View de Dashboard (Painel de Notas do Aluno) - Ajustado
    Substitui a estrutura padrão do Breeze: remove a navbar superior original,
    adiciona botões de navegação/logout integrados e alinha perfeitamente as alturas das colunas.
--}}
<x-app-layout>
    {{-- 
        Desativamos o slot antigo do header padrão do Breeze para limpar a tela 
        e construímos uma barra interna customizada, muito mais integrada ao design Burgundy.
    --}}
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- [NOVA BARRA DE TOPO INTEGRADA] - Substitui a navbar antiga do Laravel --}}
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h2 class="font-extrabold text-2xl text-burgundy-wine tracking-tight">
                        Painel Académico do Aluno
                    </h2>
                    <p class="text-xs text-gray-400 font-medium mt-1">Olá, {{ Auth::user()->name }}! Bem-vindo ao seu boletim digital.</p>
                </div>
                
                {{-- Grupo de botões de ação: Voltar para Home e Terminar Sessão (Logout) --}}
                <div class="flex items-center space-x-3">
                    {{-- Link direto para retornar à página inicial pública do site --}}
                    <a href="{{ route('home') }}" class="text-xs font-bold text-gray-500 hover:text-burgundy-normal transition-colors px-4 py-2.5 rounded-xl bg-gray-100 hover:bg-gray-200/70">
                        Voltar para a Home
                    </a>

                    {{-- 
                        Formulário Oficial de Logout do Breeze.
                        Necessita disparar um método POST por questões de segurança de sessão no Laravel.
                    --}}
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        {{-- [REQUISITO OBRIGATÓRIO: PROTEÇÃO CSRF] Garante a segurança na invalidação do token da sessão --}}
                        @csrf
                        <button type="submit" class="text-xs font-bold bg-burgundy-wine hover:bg-burgundy-normal text-white transition-colors px-4 py-2.5 rounded-xl shadow-sm">
                            Terminar Sessão
                        </button>
                    </form>
                </div>
            </div>

            {{-- [LINHA DE CARDS/WIDGETS] - Blocos informativos superiores --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Widget 1: Curso Atual --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-4">
                    <div class="p-3 bg-burgundy-beige text-burgundy-normal rounded-xl font-bold">DS</div>
                    <div>
                        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Habilitação Técnica</p>
                        <h4 class="text-base font-bold text-burgundy-wine">Desenvolvimento de Sistemas</h4>
                    </div>
                </div>

                {{-- Widget 2: Frequência Global --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-4">
                    <div class="p-3 bg-green-50 text-green-600 rounded-xl font-bold">&check;</div>
                    <div>
                        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Frequência Global</p>
                        <h4 class="text-lg font-extrabold text-gray-800">96.8% <span class="text-xs text-green-500 font-normal">(Excelente)</span></h4>
                    </div>
                </div>

                {{-- Widget 3: Unidade ETEC --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-4">
                    <div class="p-3 bg-burgundy-gold/20 text-burgundy-maroon rounded-xl font-bold">&star;</div>
                    <div>
                        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Unidade Escolar</p>
                        <h4 class="text-base font-bold text-burgundy-wine">ETEC Zona Leste</h4>
                    </div>
                </div>
            </div>

            {{-- [CONTEÚDO PRINCIPAL EM GRID] - Ajustado com a propriedade 'items-stretch' para alinhar a altura de ambos os blocos --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
                
                {{-- Lado Esquerdo (Ocupa 2 colunas): Tabela de Menções --}}
                <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col justify-between">
                    <div>
                        {{-- Cabeçalho da Tabela --}}
                        <div class="p-6 border-b border-gray-50 bg-gradient-to-r from-burgundy-wine to-burgundy-normal text-white">
                            <h3 class="font-bold text-lg">Boletim Escolar Oficial</h3>
                            <p class="text-burgundy-beige text-xs mt-1">Acompanhamento de aproveitamento por componente curricular.</p>
                        </div>

                        {{-- Elemento da Tabela HTML --}}
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-gray-50 text-gray-400 text-xs font-bold uppercase tracking-wider border-b border-gray-100">
                                        <th class="p-4 pl-6">Componente Curricular / Matéria</th>
                                        <th class="p-4 text-center">Avaliação Final</th>
                                        <th class="p-4 text-center">Situação</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50 text-sm text-gray-700">
                                    {{-- Laço @foreach carregando as notas do array dinâmico --}}
                                    @foreach($notas as $nota)
                                        <tr class="hover:bg-gray-50/50 transition-colors">
                                            <td class="p-4 pl-6 font-semibold text-gray-800">{{ $nota['materia'] }}</td>
                                            <td class="p-4 text-center">
                                                @if($nota['mencao'] == 'MB' || $nota['mencao'] == 'B')
                                                    <span class="inline-block px-3 py-1 bg-burgundy-beige text-burgundy-normal font-bold rounded-lg text-xs">
                                                        {{ $nota['mencao'] }}
                                                    </span>
                                                @else
                                                    <span class="inline-block px-3 py-1 bg-amber-50 text-amber-600 font-bold rounded-lg text-xs">
                                                        {{ $nota['mencao'] }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="p-4 text-center">
                                                @if($nota['mencao'] != 'I')
                                                    <span class="text-green-600 font-medium text-xs bg-green-50 px-2 py-0.5 rounded-full">&check; Retido</span>
                                                @else
                                                    <span class="text-red-600 font-medium text-xs bg-red-50 px-2 py-0.5 rounded-full">&excl; Retido</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Lado Direito (Ocupa 1 coluna): Caixa de Lembretes - Agora com altura perfeitamente alinhada com o Boletim --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between">
                    <div class="space-y-6">
                        <div>
                            <h3 class="font-bold text-burgundy-wine text-base">Lembretes e Prazos</h3>
                            <p class="text-gray-400 text-xs mt-0.5">Fique atento aos prazos da secretaria.</p>
                        </div>

                        {{-- Lista vertical de avisos e cronogramas acadêmicos --}}
                        <div class="space-y-4 text-xs">
                            {{-- Evento 1 --}}
                            <div class="p-3 bg-gray-50 rounded-xl border border-gray-100 space-y-1">
                                <span class="text-burgundy-normal font-bold block">27/06/2026</span>
                                <p class="text-gray-700 font-medium">Data de fecho dos diários do 1º Semestre.</p>
                            </div>
                            
                            {{-- Evento 2 --}}
                            <div class="p-3 bg-gray-50 rounded-xl border border-gray-100 space-y-1">
                                <span class="text-burgundy-normal font-bold block">24/06/2026</span>
                                <p class="text-gray-700 font-medium">Prazo final para entrega do projeto de Programação Web no Teams.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>