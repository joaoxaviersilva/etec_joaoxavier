<x-guest-layout>
    {{-- Bloco Informativo de Boas-Vindas e Confirmação --}}
    <div class="mb-5 text-sm text-gray-600 border-l-4 border-burgundy-normal bg-burgundy-beige/30 p-4 rounded-r-lg leading-relaxed">
        {{ __('Obrigado por se cadastrar no Portal ETEC! Antes de começar a usar o sistema e ver suas notas, você poderia verificar seu endereço de e-mail clicando no link que acabamos de enviar para você? Se você não recebeu o e-mail, com prazer enviaremos outro.') }}
    </div>

    {{-- Feedback visual de sucesso caso um novo link seja disparado --}}
    @if (session('status') == 'verification-link-sent')
        <div class="mb-5 font-semibold text-sm text-green-600 bg-green-50 p-3 rounded-xl border border-green-200 shadow-sm">
            {{ __('Um novo link de verificação foi enviado para o endereço de e-mail fornecido durante o seu registro acadêmico.') }}
        </div>
    @endif

    {{-- Bloco de Ações Alinhadas (Reenviar e Sair da Sessão) --}}
    <div class="mt-6 flex items-center justify-between gap-4">
        
        {{-- Formulário para solicitar um novo envio de e-mail --}}
        <form method="POST" action="{{ route('verification.send') }}">
            {{-- Token de segurança contra ataques Cross-Site Request Forgery --}}
            @csrf

            <div>
                <x-primary-button class="bg-burgundy-wine hover:bg-burgundy-maroon text-white font-bold py-2.5 px-4 rounded-xl shadow-md transition-all duration-200 transform hover:-translate-y-0.5 focus:ring-2 focus:ring-burgundy-normal focus:ring-offset-2 text-xs uppercase tracking-wider">
                    {{ __('Reenviar E-mail de Verificação') }}
                </x-primary-button>
            </div>
        </form>

        {{-- Formulário limpo para deslogar do sistema caso o aluno queira sair da tela --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-500 hover:text-burgundy-normal font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-burgundy-wine transition-colors duration-200">
                {{ __('Sair da Conta') }}
            </button>
        </form>
    </div>
</x-guest-layout>