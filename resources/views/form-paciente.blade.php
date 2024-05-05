<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastre um paciente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('salve-paciente') }}">
                        @csrf
                        <x-text-input id="idade" class="block mt-1 w-full" type="hidden" name="idade"/>

                        <div class="grid grid-cols-3 gap-2 justify-items-center align-items-start">
                            <div class="w-[100%]">
                                <x-input-label for="nome" :value="__('Nome')" />
                                <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" required autofocus />
                                <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                            </div>
                            <div class="w-[100%]" x-data>
                                <x-input-label for="cpf" :value="__('CPF')" />
                                <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" x-mask="999.999.999-99" required autofocus />
                                <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
                            </div>
                            <div class="w-[100%]">
                                <div x-data="formData()">
                                    <x-input-label for="data_nascimento" :value="__('Data de nascimento')" />
                                    <x-text-input id="data_nascimento" class="block mt-1 w-full" type="date" name="data_nascimento" required @change="verificaIdade($event)" />
                                    <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />
                                </div>
                            </div>
                            <div class="w-[100%]" x-data>
                                <x-input-label for="telefone" :value="__('Telefone')" />
                                <x-text-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" x-mask="(99)99999-9999" required autofocus />
                                <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
                            </div>
                            <div class="w-[100%]">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="w-[100%]" x-data>
                                <x-input-label for="cep" :value="__('CEP')" />
                                <x-text-input id="cep" class="block mt-1 w-full" type="text" name="cep" x-mask="99999-999" required autofocus @input="carregaValoresCep($event)" />
                                <x-input-error :messages="$errors->get('cep')" class="mt-2" />
                            </div>
                            <div class="w-[100%]">
                                <x-input-label for="bairro" :value="__('Bairro')" />
                                <x-text-input id="bairro" class="block mt-1 w-full" type="text" name="bairro" required autofocus />
                                <x-input-error :messages="$errors->get('bairro')" class="mt-2" />
                            </div>
                            <div class="w-[100%]">
                                <x-input-label for="cidade" :value="__('Cidade')" />
                                <x-text-input id="cidade" class="block mt-1 w-full" type="text" name="cidade" required autofocus />
                                <x-input-error :messages="$errors->get('cidade')" class="mt-2" />
                            </div>
                            <div class="w-[100%]">
                                <x-input-label for="rua" :value="__('Rua')" />
                                <x-text-input id="rua" class="block mt-1 w-full" type="text" name="rua" required autofocus />
                                <x-input-error :messages="$errors->get('rua')" class="mt-2" />
                            </div>
                            <div class="w-[100%]">
                                <x-input-label for="endereco_numero" :value="__('Número')" />
                                <x-text-input id="endereco_numero" class="block mt-1 w-full" type="number" name="endereco_numero" required autofocus />
                                <x-input-error :messages="$errors->get('endereco_numero')" class="mt-2" />
                            </div>
                            <div class="w-[100%]">
                                <x-input-label for="complemento" :value="__('Complemento')" />
                                <x-text-input id="complemento" class="block mt-1 w-full" type="text" name="complemento" required autofocus />
                                <x-input-error :messages="$errors->get('complemento')" class="mt-2" />
                            </div>
                            <div class="w-[100%]">
                                <x-input-label for="estado" :value="__('Estado')" />
                                <x-text-input id="estado" class="block mt-1 w-full" type="text" name="estado" required autofocus />
                                <x-input-error :messages="$errors->get('estado')" class="mt-2" />
                            </div>
                        </div>
                        <div id="divResponsavel" >
                            <hr>
                            <h3 class="mb-3">Dados do responsavel</h3>
                            <div class="grid grid-cols-3 gap-2 justify-items-center align-items-start">
                                <div class="w-[100%]">
                                    <x-input-label for="nome_reponsavel" :value="__('Nome')" />
                                    <x-text-input id="nome_reponsavel" class="block mt-1 w-full" type="text" name="nome_responsavel" autofocus />
                                    <x-input-error :messages="$errors->get('nome_reponsavel')" class="mt-2" />
                                </div>
                                <div class="w-[100%]" x-data>
                                    <x-input-label for="cpf_reponsavel" :value="__('CPF')" />
                                    <x-text-input id="cpf_reponsavel" class="block mt-1 w-full" type="text" name="cpf_responsavel" x-mask="999.999.999-99" autofocus />
                                    <x-input-error :messages="$errors->get('cpf_reponsavel')" class="mt-2" />
                                </div>
                                <div class="w-[100%]" x-data>
                                    <x-input-label for="telefone_reponsavel" :value="__('Telefone')" />
                                    <x-text-input id="telefone_reponsavel" class="block mt-1 w-full" type="text" name="telefone_responsavel" x-mask="(99)99999-9999" autofocus />
                                    <x-input-error :messages="$errors->get('telefone_reponsavel')" class="mt-2" />
                                </div>
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
        document.getElementById('divResponsavel').style.display = 'none';
        mensagensValidacao( "{{ $mensagem }}" )  
    };

    function carregaValoresCep(event) {
        const cep = event.target.value; 

        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
                if (data.erro) {
                    console.error('CEP não encontrado');
                } else {
                    document.getElementById('bairro').value = data['bairro'];
                    document.getElementById('cidade').value = data['localidade'];
                    document.getElementById('rua').value = data['logradouro'];
                    document.getElementById('estado').value = data['uf'];
                }
            })
            .catch(error => console.error('Erro ao buscar CEP:', error));
    }

    function formData() {
        return {
            verificaIdade(event) {
                const dataNascimento = event.target.value;
                
                const diaHoje = new Date();
                const DataAniversario = new Date(dataNascimento);

                let idade = diaHoje.getFullYear() - DataAniversario.getFullYear();
                const diferencaMes = diaHoje.getMonth() - DataAniversario.getMonth();

                if (diferencaMes < 0 || (diferencaMes === 0 && diaHoje.getDate() < DataAniversario.getDate())) {
                    idade--;
                }

                document.getElementById('idade').value = idade;

                if(idade < 18)
                    document.getElementById('divResponsavel').style.display = 'block';
            }
        };
    }
</script>
