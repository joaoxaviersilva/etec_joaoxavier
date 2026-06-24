{{-- 
    View de Eventos Académicos
    Esta página estende o Layout Mestre e renderiza os eventos institucionais 
    e feiras de tecnologia configuradas no nosso controlador.
--}}
@extends('layouts.site')

{{-- Define o início da secção de conteúdo que substitui o @yield no layout --}}
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Cabeçalho estruturado com alinhamento centralizado --}}
    <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
        <h1 class="text-4xl font-extrabold text-burgundy-wine tracking-tight">Agenda de Eventos</h1>
        <p class="text-gray-600">
            Fique por dentro das palestras, feiras de profissões, semanas técnicas e atividades culturais da nossa unidade.
        </p>
        {{-- Separador visual utilizando a cor Ouro da paleta --}}
        <div class="w-24 h-1 bg-burgundy-gold mx-auto rounded-full"></div>
    </div>

    {{-- Layout em lista vertical (Timeline) para organização cronológica dos eventos --}}
    <div class="max-w-4xl mx-auto space-y-6">

        {{-- 
            Estrutura de Repetição (@foreach):
            Itera sobre cada item do array '$eventos' repassado dinamicamente pelo EtecController.
        --}}
        @foreach($eventos as $evento)
            {{-- Bloco do evento estilizado com uma borda lateral esquerda grossa na cor Bordô principal --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm border-l-4 border-burgundy-normal border-y border-r border-gray-100 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                
                {{-- Lado Esquerdo: Detalhes textuais do acontecimento --}}
                <div class="space-y-2 max-w-2xl">
                    {{-- Título do Evento extraído do Array mocado --}}
                    <h3 class="text-xl font-bold text-burgundy-wine">{{ $evento['titulo'] }}</h3>
                    {{-- Descrição detalhada do cronograma ou atividade --}}
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $evento['descricao'] }}
                    </p>
                </div>

                {{-- Lado Direito: Metadados estruturados (Data e Localização física) --}}
                <div class="flex flex-col space-y-2 md:text-right text-xs shrink-0 min-w-[200px]">
                    {{-- Exibição do horário e dia do evento --}}
                    <div class="text-gray-700 font-medium">
                        <span class="text-burgundy-normal font-bold">Quando:</span> {{ $evento['data_evento'] }}
                    </div>
                    {{-- Local físico ou pavilhão da ETEC onde ocorrerá --}}
                    <div class="text-gray-500">
                        <span class="text-burgundy-normal font-bold">Onde:</span> {{ $evento['local'] }}
                    </div>
                </div>

            </div>
        @endforeach {{-- Finaliza a renderização da lista de eventos --}}

    </div>

</div>
@endsection