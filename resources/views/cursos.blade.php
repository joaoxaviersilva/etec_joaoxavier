{{-- 
    View de Cursos Técnicos
    Esta página herda o esqueleto do Layout Mestre e exibe a lista de cursos 
    enviada dinamicamente a partir do EtecController.
--}}
@extends('layouts.site')

{{-- Injeta o conteúdo principal na estrutura do layout mestre --}}
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Cabeçalho da página com título estilizado usando a cor Vinho Profundo --}}
    <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
        <h1 class="text-4xl font-extrabold text-burgundy-wine tracking-tight">Nossos Cursos Técnicos</h1>
        <p class="text-gray-600">
            Conheça as formações profissionais disponíveis na ETEC Zona Leste e escolha a trilha ideal para a tua carreira.
        </p>
        {{-- Linha decorativa horizontal na cor Ouro Envelhecido da paleta --}}
        <div class="w-24 h-1 bg-burgundy-gold mx-auto rounded-full"></div>
    </div>

    {{-- Grid responsivo: 1 coluna em telemóveis, 2 em tablets e 3 em ecrãs maiores --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        {{-- 
            Laço de Repetição Blade (@foreach):
            Percorre a matriz '$cursos' que foi definida e injetada pelo método 'cursos()' do EtecController.
        --}}
        @foreach($cursos as $curso)
            {{-- Card individual do curso com transição suave de sombra no Hover --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between hover:shadow-md transition-shadow">
                
                <div class="space-y-4">
                    {{-- Badge indicativa do período com a cor Bordô (burgundy-normal) --}}
                    <span class="inline-block text-xs font-semibold text-burgundy-normal bg-burgundy-beige px-3 py-1 rounded-full">
                        {{ $curso['periodo'] }}
                    </span>
                    
                    {{-- Título dinâmico do Curso Técnico --}}
                    <h3 class="text-xl font-bold text-burgundy-wine">{{ $curso['nome'] }}</h3>
                    
                    {{-- Descrição ou perfil profissional do curso --}}
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $curso['descricao'] }}
                    </p>
                </div>

                {{-- Bloco de rodapé do card mostrando a duração total --}}
                <div class="mt-6 pt-4 border-t border-gray-50 flex items-center justify-between text-xs text-gray-500">
                    <span class="font-medium">Duração:</span>
                    <span class="text-burgundy-normal font-semibold">{{ $curso['duracao'] }}</span>
                </div>
                
            </div>
        @endforeach {{-- Encerra o laço de repetição dos cursos --}}

    </div>

</div>
@endsection