{{-- Indica que esta View vai herdar e preencher a estrutura definida no Layout Mestre 'site' --}}
@extends('layouts.site')

{{-- Define o início do bloco de conteúdo que será injetado na diretiva @yield('content') do layout mestre --}}
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    {{-- [Seção Hero] Bloco de destaque visual baseado na fluidez espacial e minimalismo da imagem 'image_d6e3df.jpg' --}}
    <div class="bg-gradient-to-br from-burgundy-wine to-burgundy-normal text-white rounded-3xl p-8 md:p-16 shadow-xl relative overflow-hidden mb-12">
        
        {{-- Alinhamento e limitação de largura do texto interno para garantir boa leitura --}}
        <div class="max-w-2xl space-y-6 relative z-10">
            {{-- Badge decorativa de identificação institucional --}}
            <span class="text-burgundy-gold font-semibold uppercase tracking-widest text-xs px-3 py-1 bg-white/10 rounded-full">Ensino Público e Gratuito</span>
            
            {{-- Título principal com tipografia forte e expandida --}}
            <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight leading-tight">Onde o Seu Futuro Técnico Cresce</h1>
            
            {{-- Texto de apoio sutil usando os tons claros da paleta Champagne Beige --}}
            <p class="text-burgundy-beige text-lg md:text-xl font-light">
                Formando profissionais de alta performance em tecnologia, gestão e infraestrutura na Zona Leste de São Paulo.
            </p>
            
            {{-- Botão de ação (Call to Action) apontando dinamicamente para a rota de Cursos --}}
            <div class="pt-4">
                <a href="{{ route('cursos') }}" class="bg-burgundy-gold hover:bg-yellow-300 text-burgundy-wine font-bold px-8 py-3.5 rounded-xl transition-all shadow-md inline-block">Conheça Nossos Cursos</a>
            </div>
        </div>

        {{-- Círculo com efeito Blur abstrato no fundo para emular os focos de iluminação do design de referência --}}
        <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-burgundy-gold/10 rounded-full blur-3xl"></div>
    </div>

    {{-- [Grid de Diferenciais] Estrutura de três colunas responsivas para os pilares da escola --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        {{-- Card 1: Infraestrutura --}}
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow space-y-4">
            {{-- Ícone/Símbolo minimalista estilizado com fundo Champagne Beige e cor Bordô --}}
            <div class="w-12 h-12 bg-burgundy-beige rounded-xl flex items-center justify-center text-burgundy-normal font-bold text-lg">&plus;</div>
            <h3 class="text-xl font-bold text-burgundy-wine">Infraestrutura Moderna</h3>
            <p class="text-gray-600 text-sm leading-relaxed">Laboratórios de informática equipados com softwares de ponta, redes estruturadas e salas de aula prontas para o aprendizado prático.</p>
        </div>
        
        {{-- Card 2: Corpo Docente --}}
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow space-y-4">
            <div class="w-12 h-12 bg-burgundy-beige rounded-xl flex items-center justify-center text-burgundy-normal font-bold text-lg">&star;</div>
            <h3 class="text-xl font-bold text-burgundy-wine">Corpo Docente Especializado</h3>
            <p class="text-gray-600 text-sm leading-relaxed">Professores atuantes no mercado de trabalho, prontos para guiar você em projetos interdisciplinares de alto nível.</p>
        </div>

        {{-- Card 3: Inserção no Mercado --}}
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow space-y-4">
            <div class="w-12 h-12 bg-burgundy-beige rounded-xl flex items-center justify-center text-burgundy-normal font-bold text-lg">&check;</div>
            <h3 class="text-xl font-bold text-burgundy-wine">Foco no Mercado</h3>
            <p class="text-gray-600 text-sm leading-relaxed">Parcerias estratégicas locais impulsionando nossos alunos rumo a estágios e vagas de Jovem Aprendiz no setor de tecnologia.</p>
        </div>
    </div>

</div>
{{-- Encerra o bloco de conteúdo desta view --}}
@endsection