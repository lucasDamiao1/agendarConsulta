<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agende uma consulta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('salve-consulta') }}">
                        @csrf
                        <div class="grid grid-cols-3 gap-2 justify-items-center align-items-start">
                            <div id="blocoPaciente" class="w-[100%]">
                                <x-select
                                    name="id_paciente"
                                    id="id_paciente"
                                    label="paciente"
                                    :options="$pacientes"
                                    campos="CPF"
                                />
                            </div>
                            <div class="w-[100%]">
                                <x-select
                                    name="id_medico"
                                    id="id_medico"
                                    label="medico"
                                    :options="$medicos"
                                    campos="CRM"
                                />
                            </div>
                            <div class="w-[100%]">
                                <x-input-label for="data_consulta" :value="__('Dia da consulta')" />
                                <x-text-input id="data_consulta" class="block mt-1 w-full" type="datetime-local" name="data_consulta" required autofocus />
                                <x-input-error :messages="$errors->get('data_consulta')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-3">Agendar</x-primary-button>
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
        mensagensValidacao( "{{ $mensagem }}" )  ;
    };

</script>
