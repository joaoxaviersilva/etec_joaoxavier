{{-- Reaproveita o esqueleto global do site público --}}
@extends('layouts.site')

{{-- Injeta a interface gráfica customizada de erro 404 dentro do Layout Mestre --}}
@section('content')
<div class="max-w-md mx-auto text-center py-24 px-4 space-y-6">
    
    {{-- Código numérico do erro destacado em tamanho gigante usando a cor Bordô principal --}}
    <h1 class="text-9xl font-extrabold text-burgundy-normal tracking-widest">404</h1>
    
    {{-- Mensagem descritiva do erro para orientação do utilizador --}}
    <h2 class="text-2xl font-bold text-burgundy-wine">Página Não Encontrada</h2>
    
    {{-- Explicação clara sobre o motivo da falha ou erro de digitação da URL --}}
    <p class="text-gray-500 text-sm leading-relaxed">
        O link que você tentou acessar não existe ou foi movido para outro endereço dentro do portal da ETEC Zona Leste.
    </p>
    
    {{-- Botão amigável de retorno seguro para a página inicial pública --}}
    <div class="pt-4">
        <a href="{{ route('home') }}" class="bg-burgundy-wine hover:bg-burgundy-normal text-white px-6 py-3 rounded-xl text-sm font-medium transition-colors shadow-sm inline-block">
            Voltar para a Home
        </a>
    </div>
</div>
@endsection