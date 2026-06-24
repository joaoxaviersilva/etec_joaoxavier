{{-- 
    Arquivo de Layout Mestre (Base Compartilhada)
    Este arquivo define a estrutura global do HTML (Cabeçalho e Rodapé) 
    que será herdada pelas páginas secundárias (Home, Cursos, Eventos).
--}}
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    {{-- Configurações globais de codificação de caracteres e responsividade --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Zona Leste - Programação Web</title>
    
    {{-- Diretiva Vite: Compila e injeta os arquivos de estilo CSS (Tailwind) e scripts JavaScript automaticamente --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 font-sans flex flex-col min-h-screen">

    {{-- [Header / Barra de Navegação] Estilizada com a paleta Burgundy e Ouro fornecida --}}
    <header class="bg-burgundy-wine text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            
            {{-- Logotipo/Identificação visual da escola --}}
            <div class="flex items-center space-x-2">
                <span class="text-xl font-bold tracking-wider text-burgundy-beige">Etec Zona Leste</span>
            </div>
            
            {{-- Links de Navegação Principal mapeados através das rotas nomeadas do Laravel --}}
            <nav class="hidden md:flex space-x-8 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-burgundy-gold transition-colors">Home</a>
                <a href="{{ route('cursos') }}" class="hover:text-burgundy-gold transition-colors">Cursos</a>
                <a href="{{ route('eventos') }}" class="hover:text-burgundy-gold transition-colors">Eventos</a>
            </nav>

            {{-- Área Administrativa de Autenticação com tratamento de sessão do Breeze --}}
            <div class="flex items-center space-x-4">
                {{-- Diretiva @auth: Exibida apenas se o aluno já estiver logado no sistema --}}
                @auth
                    {{-- Link direto que redireciona para a área interna de notas protegida --}}
                    <a href="{{ route('dashboard') }}" class="bg-burgundy-normal hover:bg-burgundy-maroon text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">Meu Painel</a>
                {{-- Diretiva @else: Ativada caso o utilizador seja um visitante anónimo --}}
                @else
                    {{-- Links que direcionam para as views de Login e Cadastro do Laravel Breeze --}}
                    <a href="{{ route('login') }}" class="text-sm font-medium hover:text-burgundy-gold transition-colors">Entrar</a>
                    <a href="{{ route('register') }}" class="bg-burgundy-normal hover:bg-burgundy-maroon text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">Cadastrar</a>
                @endauth
            </div>
        </div>
    </header>

    {{-- [Espaço de Conteúdo Dinâmico] Onde o Blade injetará o código específico de cada View filha --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- [Footer / Rodapé] Elemento estático unificado com dados institucionais --}}
    <footer class="bg-burgundy-wine text-burgundy-beige border-t border-burgundy-maroon py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs space-y-2">
            {{-- Injeta dinamicamente o ano corrente usando a função nativa date() do PHP --}}
            <p>&copy; {{ date('Y') }} ETEC Zona Leste. Todos os direitos reservados.</p>
            <p>Trabalho Prático de Programação Web - Desenvolvido com Laravel & Tailwind CSS por João Xavier.</p>
        </div>
    </footer>

</body>
</html>