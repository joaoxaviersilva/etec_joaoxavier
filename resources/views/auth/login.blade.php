{{-- 
    View de Autenticação - Login de Alunos (Customizado)
    Este ficheiro foi totalmente reestruturado com Tailwind CSS para seguir o design 
    da imagem 'image_d6dfff.png', utilizando a paleta de cores Burgundy e omitindo as redes sociais.
--}}
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ETEC Zona Leste</title>
    {{-- Injeta o motor de renderização do Tailwind CSS e JavaScript através do Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4 md:p-0">

    {{-- [Container Principal Split] Divide o ecrã em duas partes no desktop --}}
    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden max-w-4xl w-full flex flex-col md:flex-row min-h-[550px]">
        
        {{-- [Lado Esquerdo: Form de Entrada] Área limpa onde o utilizador insere as credenciais --}}
        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-between">
            
            {{-- Identificação Superior --}}
            <div>
                <a href="{{ route('home') }}" class="text-xs font-bold uppercase tracking-wider text-burgundy-normal hover:underline">&larr; Voltar para o Site</a>
                <h2 class="text-3xl font-extrabold text-burgundy-wine mt-6 tracking-tight">Bem-vindo de volta</h2>
                <p class="text-gray-500 text-sm mt-2">Introduza as suas credenciais para aceder ao painel de notas.</p>
            </div>

            {{-- 
                Formulário Oficial de Login do Laravel 
                Aponta para a rota padrão POST 'login' gerida pelo controlador interno do Breeze.
            --}}
            <form method="POST" action="{{ route('login') }}" class="space-y-5 mt-6">
                {{-- [REQUISITO OBRIGATÓRIO: PROTEÇÃO CSRF] Injeta o token de segurança para evitar ataques Cross-Site Request Forgery --}}
                @csrf

                {{-- Exibição Global de Erros de Validação (caso o email ou password estejam incorretos) --}}
                @if ($errors->any())
                    <div class="bg-red-50 text-red-600 p-3 rounded-xl text-xs font-medium space-y-1">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                {{-- Input 1: Endereço de Email --}}
                <div class="space-y-1">
                    <label for="email" class="text-xs font-bold uppercase tracking-wide text-gray-700 block">Endereço de Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="nome@etec.sp.gov.br" 
                        class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 text-sm focus:bg-white focus:border-burgundy-normal focus:ring-2 focus:ring-burgundy-beige transition-all outline-none" />
                </div>

                {{-- Input 2: Palavra-passe / Senha --}}
                <div class="space-y-1">
                    <div class="flex items-center justify-between">
                        <label for="password" class="text-xs font-bold uppercase tracking-wide text-gray-700 block">Palavra-passe</label>
                        {{-- Link de recuperação assistida da palavra-passe --}}
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs font-semibold text-burgundy-normal hover:underline">Esqueceu-se?</a>
                        @endif
                    </div>
                    <input id="password" type="password" name="password" required placeholder="••••••••" 
                        class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 text-sm focus:bg-white focus:border-burgundy-normal focus:ring-2 focus:ring-burgundy-beige transition-all outline-none" />
                </div>

                {{-- Checkbox: Manter Sessão Iniciada (Remember Me) --}}
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-burgundy-normal focus:ring-burgundy-normal h-4 w-4">
                    <label for="remember_me" class="ml-2 text-xs text-gray-600 font-medium select-none">Lembrar-me neste dispositivo</label>
                </div>

                {{-- Botão Principal de Submissão --}}
                <div class="pt-2">
                    <button type="submit" class="w-full bg-burgundy-wine hover:bg-burgundy-normal text-white font-bold py-3.5 px-4 rounded-xl transition-all shadow-md active:scale-[0.98]">
                        Iniciar Sessão
                    </button>
                </div>
            </form>

            {{-- Link de Rodapé Alternativo para Registo de Novo Aluno --}}
            <div class="text-center text-xs text-gray-500 mt-6">
                Não possui uma conta? <a href="{{ route('register') }}" class="font-bold text-burgundy-normal hover:underline">Registre-se aqui</a>
            </div>

        </div>

        {{-- [Lado Direito: Painel do Gradiente] Réplica perfeita do conceito visual da imagem enviado --}}
        <div class="hidden md:flex w-1/2 bg-gradient-to-tr from-burgundy-wine via-burgundy-maroon to-burgundy-normal text-white p-12 flex-col justify-between relative overflow-hidden">
            
            {{-- Camada Decorativa para dar profundidade ao gradiente --}}
            <div class="absolute inset-0 bg-black/10 mix-blend-overlay"></div>
            
            <div class="relative z-10">
                <span class="text-burgundy-gold font-bold uppercase tracking-widest text-xs px-3 py-1 bg-white/10 rounded-full">Portal do Aluno</span>
            </div>

            {{-- Texto de Impacto centralizado imitando o design original --}}
            <div class="relative z-10 space-y-4">
                <h3 class="text-3xl font-extrabold tracking-tight leading-tight">Verifique as suas notas e desempenho de forma simples.</h3>
                <p class="text-burgundy-beige/80 text-sm font-light leading-relaxed">
                    Aceda ao sistema integrado da ETEC Zona Leste para acompanhar o seu progresso académico, faltas e menções em tempo real.
                </p>
            </div>

            {{-- Metadados decorativos inferiores --}}
            <div class="relative z-10 text-xs text-burgundy-gold/60 font-medium">
                ETEC Zona Leste &copy; {{ date('Y') }}
            </div>

            {{-- Círculos geométricos desfocados para simular os focos de luz orgânicos --}}
            <div class="absolute -right-10 -top-10 w-64 h-64 bg-burgundy-gold/10 rounded-full blur-2xl"></div>
            <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-white/5 rounded-full blur-3xl"></div>

        </div>

    </div>

</body>
</html>