<x-guest-layout>
    {{-- Bloco Informativo de Instrução --}}
    <div class="mb-5 text-sm text-gray-600 border-l-4 border-burgundy-normal bg-burgundy-beige/30 p-4 rounded-r-lg leading-relaxed">
        {{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail institucional e nós enviaremos um link de redefinição que permitirá escolher uma nova senha.') }}
    </div>

    <x-auth-session-status class="mb-4 text-sm font-semibold text-green-600 bg-green-50 p-3 rounded-xl border border-green-200" :status="session('status')" />

    {{-- Formulário de Recuperação --}}
    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        {{-- Diretiva de segurança obrigatória contra falsificação de requisição cross-site --}}
        @csrf

        <div>
            <x-input-label for="email" :value="__('E-mail Cadastrado')" class="text-gray-700 font-semibold text-sm" />
            
            <x-text-input id="email" class="block mt-1.5 w-full rounded-xl border-gray-300 shadow-sm focus:border-burgundy-normal focus:ring focus:ring-burgundy-wine/20 transition-all duration-200" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            placeholder="exemplo@etec.sp.gov.br"
                            required 
                            autofocus />
            
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs font-semibold text-red-600" />
        </div>

        {{-- Área do Botão de Ação --}}
        <div class="flex items-center justify-end pt-2">
            <x-primary-button class="bg-burgundy-wine hover:bg-burgundy-maroon text-white font-bold py-2.5 px-5 rounded-xl shadow-md transition-all duration-200 transform hover:-translate-y-0.5 focus:ring-2 focus:ring-burgundy-normal focus:ring-offset-2">
                {{ __('Enviar Link de Redefinição') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>