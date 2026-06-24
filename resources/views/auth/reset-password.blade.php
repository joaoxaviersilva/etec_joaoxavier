<x-guest-layout>
    {{-- Cabeçalho interno da tela de redefinição --}}
    <div class="mb-6 text-center">
        <h2 class="text-xl font-extrabold text-gray-800 tracking-tight">Criar Nova Senha</h2>
        <p class="text-xs text-gray-500 mt-1">Preencha os campos abaixo para atualizar suas credenciais de acesso.</p>
    </div>

    {{-- Formulário de Redefinição Física da Senha --}}
    <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
        {{-- Diretiva obrigatória de segurança do ecossistema Laravel --}}
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <x-input-label for="email" :value="__('Confirmar E-mail')" class="text-gray-700 font-semibold text-sm" />
            
            <x-text-input id="email" class="block mt-1.5 w-full rounded-xl border-gray-300 shadow-sm focus:border-burgundy-normal focus:ring focus:ring-burgundy-wine/20 transition-all duration-200 bg-gray-50 text-gray-600" 
                            type="email" 
                            name="email" 
                            :value="old('email', $request->email)" 
                            required 
                            autofocus 
                            autocomplete="username" />
            
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs font-semibold text-red-600" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Nova Senha')" class="text-gray-700 font-semibold text-sm" />
            
            <x-text-input id="password" class="block mt-1.5 w-full rounded-xl border-gray-300 shadow-sm focus:border-burgundy-normal focus:ring focus:ring-burgundy-wine/20 transition-all duration-200" 
                            type="password" 
                            name="password" 
                            placeholder="Mínimo 8 caracteres"
                            required 
                            autocomplete="new-password" />
            
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs font-semibold text-red-600" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmar Nova Senha')" class="text-gray-700 font-semibold text-sm" />

            <x-text-input id="password_confirmation" class="block mt-1.5 w-full rounded-xl border-gray-300 shadow-sm focus:border-burgundy-normal focus:ring focus:ring-burgundy-wine/20 transition-all duration-200"
                            type="password"
                            name="password_confirmation" 
                            placeholder="Digite a senha novamente"
                            required 
                            autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs font-semibold text-red-600" />
        </div>

        {{-- Botão de Submissão e Ação Final --}}
        <div class="flex items-center justify-end pt-2">
            <x-primary-button class="bg-burgundy-wine hover:bg-burgundy-maroon text-white font-bold py-2.5 px-6 rounded-xl shadow-md transition-all duration-200 transform hover:-translate-y-0.5 focus:ring-2 focus:ring-burgundy-normal focus:ring-offset-2">
                {{ __('Redefinir Minha Senha') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>