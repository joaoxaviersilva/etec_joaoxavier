{{-- 
    View de Autenticação - Registo de Novos Alunos (Customizado)
    Este ficheiro foi totalmente reestruturado com Tailwind CSS para seguir a mesma linha visual
    da imagem 'image_d6dfff.png', utilizando a paleta Burgundy e incluindo comentários em todo o código.
--}}
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - ETEC Zona Leste</title>
    {{-- Injeta as diretivas do Tailwind CSS e JavaScript compiladas pelo Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4 md:p-0">

    {{-- [Container Principal Split] Divide o ecrã em duas partes idênticas ao ecrã de Login --}}
    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden max-w-4xl w-full flex flex-col md:flex-row min-h-[600px]">
        
        {{-- [Lado Esquerdo: Form de Cadastro] Entrada de dados para criação de nova conta --}}
        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-between">
            
            {{-- Identificação Superior e Link de Retorno --}}
            <div>
                <a href="{{ route('home') }}" class="text-xs font-bold uppercase tracking-wider text-burgundy-normal hover:underline">&larr; Voltar para o Site</a>
                <h2 class="text-3xl font-extrabold text-burgundy-wine mt-6 tracking-tight">Crie a sua conta</h2>
                <p class="text-gray-500 text-sm mt-2">Cadastre-se para obter acesso ao seu boletim de notas eletrónico.</p>
            </div>

            {{-- 
                Formulário Oficial de Registo do Laravel 
                Envia uma requisição POST para a rota 'register' gerida pelos controladores do Breeze.
            --}}
            <form method="POST" action="{{ route('register') }}" class="space-y-4 mt-6">
                {{-- [REQUISITO OBRIGATÓRIO: PROTEÇÃO CSRF] Garante a segurança contra falsificação de solicitações --}}
                @csrf

                {{-- Exibição de Erros Internos de Validação de Dados --}}
                @if ($errors->any())
                    <div class="bg-red-50 text-red-600 p-3 rounded-xl text-xs font-medium space-y-1">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                {{-- Input 1: Nome Completo do Aluno --}}
                <div class="space-y-1">
                    <label for="name" class="text-xs font-bold uppercase tracking-wide text-gray-700 block">Nome Completo</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="João Silva" 
                        class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 text-sm focus:bg-white focus:border-burgundy-normal focus:ring-2 focus:ring-burgundy-beige transition-all outline-none" />
                </div>

                {{-- Input 2: Endereço de Email Institucional --}}
                <div class="space-y-1">
                    <label for="email" class="text-xs font-bold uppercase tracking-wide text-gray-700 block">Endereço de Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="nome@etec.sp.gov.br" 
                        class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 text-sm focus:bg-white focus:border-burgundy-normal focus:ring-2 focus:ring-burgundy-beige transition-all outline-none" />
                </div>

                {{-- Input 3: Palavra-passe / Senha --}}
                <div class="space-y-1">
                    <label for="password" class="text-xs font-bold uppercase tracking-wide text-gray-700 block">Palavra-passe</label>
                    <input id="password" type="password" name="password" required placeholder="Mínimo 8 caracteres" 
                        class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 text-sm focus:bg-white focus:border-burgundy-normal focus:ring-2 focus:ring-burgundy-beige transition-all outline-none" />
                </div>

                {{-- Input 4: Confirmação da Palavra-passe --}}
                <div class="space-y-1">
                    <label for="password_confirmation" class="text-xs font-bold uppercase tracking-wide text-gray-700 block">Confirmar Palavra-passe</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="Repita a palavra-passe" 
                        class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 text-sm focus:bg-white focus:border-burgundy-normal focus:ring-2 focus:ring-burgundy-beige transition-all outline-none" />
                </div>

                {{-- Botão de Submissão do Registo --}}
                <div class="pt-2">
                    <button type="submit" class="w-full bg-burgundy-wine hover:bg-burgundy-normal text-white font-bold py-3.5 px-4 rounded-xl transition-all shadow-md active:scale-[0.98]">
                        Criar Minha Conta
                    </button>
                </div>
            </form>

            {{-- Link para Alternar para a View de Login Existente --}}
            <div class="text-center text-xs text-gray-500 mt-6">
                Já possui uma conta registada? <a href="{{ route('login') }}" class="font-bold text-burgundy-normal hover:underline">Inicie sessão aqui</a>
            </div>

        </div>

        {{-- [Lado Direito: Painel do Gradiente] Mantém a consistência visual idêntica à tela de Login --}}
        <div class="hidden md:flex w-1/2 bg-gradient-to-tr from-burgundy-wine via-burgundy-maroon to-burgundy-normal text-white p-12 flex-col justify-between relative overflow-hidden">
            
            {{-- Filtro de opacidade para refinamento estético --}}
            <div class="absolute inset-0 bg-black/10 mix-blend-overlay"></div>
            
            <div class="relative z-10">
                <span class="text-burgundy-gold font-bold uppercase tracking-widest text-xs px-3 py-1 bg-white/10 rounded-full">Novo Registro</span>
            </div>

            {{-- Mensagem Institucional de Boas-vindas --}}
            <div class="relative z-10 space-y-4">
                <h3 class="text-3xl font-extrabold tracking-tight leading-tight">Faça parte do ecossistema tecnológico da ETEC Zona Leste.</h3>
                <p class="text-burgundy-beige/80 text-sm font-light leading-relaxed">
                    Cadastre os seus dados e ganhe acesso imediato ao ambiente interno protegido de notas, frequências acadêmicas e cronogramas de avaliações.
                </p>
            </div>

            {{-- Direitos autorais do rodapé do card --}}
            <div class="relative z-10 text-xs text-burgundy-gold/60 font-medium">
                ETEC Zona Leste &copy; {{ date('Y') }}
            </div>

            {{-- Círculos geométricos desfocados para emular os pontos de luz orgânicos --}}
            <div class="absolute -right-10 -top-10 w-64 h-64 bg-burgundy-gold/10 rounded-full blur-2xl"></div>
            <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-white/5 rounded-full blur-3xl"></div>

        </div>

    </div>

</body>
</html>