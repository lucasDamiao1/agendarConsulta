<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastre um médico') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('salve-medico') }}">
                        @csrf
                        <div class="grid grid-cols-3 gap-2 justify-items-center align-items-start">
                            <div class="w-[100%]">
                                <x-input-label for="crm" :value="__('CRM')" />
                                <x-text-input id="crm" class="block mt-1 w-full" type="number" name="crm" required autofocus />
                                <x-input-error :messages="$errors->get('crm')" class="mt-2" />
                            </div>
                            <div class="w-[100%]">
                                <x-input-label for="nome" :value="__('Nome')" />
                                <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" required autofocus />
                                <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                            </div>
                            <div class="w-[100%]">
                                <x-select
                                    name="especialidade"
                                    id="especialidade"
                                    label="Especialidade"
                                    :options="$especialidades"
                                />
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
    function mensagensValidacao(mensagem) {
        if(mensagem)
            alert(mensagem);
    }

    window.onload = function() {
        mensagensValidacao( "{{ $mensagem }}" )  
    };
</script>