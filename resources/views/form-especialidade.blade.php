<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastre uma Especialidades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('salve-especialidade') }}">
                        @csrf
                        <div class="flex items-center gap-2 justify-between mt-4">
                            <div class="w-[30%]">
                                <x-input-label for="codigo" :value="__('Codigo')" />
                                <x-text-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" required autofocus />
                                <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
                            </div>
                            <div class="w-[70%]">
                                <x-input-label for="nome" :value="__('Nome')" />
                                <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" required autofocus />
                                <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-3">Cadastrar</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function mensagensValidacao(divergente, mensagem) {
        if(mensagem)
            alert(mensagem);
    }

    window.onload = function() {
        mensagensValidacao( {{ $divergente ? 'true' : 'false' }}, "{{ $mensagem }}" )  
    };
</script>
