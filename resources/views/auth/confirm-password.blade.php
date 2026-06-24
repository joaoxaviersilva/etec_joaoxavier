<x-guest-layout>
    {{-- Bloco Informativo de Segurança --}}
    <div class="mb-5 text-sm text-gray-600 border-l-4 border-burgundy-normal bg-burgundy-beige/30 p-4 rounded-r-lg leading-relaxed">
        {{ __('Esta é uma área segura da aplicação acadêmica. Por favor, confirme a sua senha institucional antes de continuar para validar sua identidade.') }}
    </div>

    {{-- Formulário de Validação de Senha --}}
    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
        {{ -- Requisito de Segurança Obrigatório contra ataques cross-site --}}
        @csrf

        <div>
            {{-- Label estilizada puxando os utilitários do Tailwind --}}
            <x-input-label for="password" :value="__('Sua Senha Institucional')" class="text-gray-700 font-semibold text-sm" />

            {{-- Input customizado com foco suave na paleta Burgundy --}}
            <x-text-input id="password" class="block mt-1.5 w-full rounded-xl border-gray-300 shadow-sm focus:border-burgundy-normal focus:ring focus:ring-burgundy-wine/20 transition-all duration-200"
                            type="password"
                            name="password"
                            required 
                            placeholder="Digite sua senha para confirmar"
                            autocomplete="current-password" />

            {{-- Exibição de erros de validação do banco de dados --}}
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs font-semibold text-red-600" />
        </div>

        {{-- Área de Ação e Submissão --}}
        <div class="flex justify-end pt-2">
            <x-primary-button class="bg-burgundy-wine hover:bg-burgundy-maroon text-white font-bold py-2.5 px-6 rounded-xl shadow-md transition-all duration-200 transform hover:-translate-y-0.5 focus:ring-2 focus:ring-burgundy-normal focus:ring-offset-2">
                {{ __('Confirmar Identidade') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>