<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Responsavel;
use Illuminate\Http\Request;

/**
 * PacienteController é responsável por lidar com operações relacionadas a pacientes.
 */
class PacienteController extends Controller
{
    /**
     * Exibe uma listagem dos recursos.
     *
     * @return void
     */
    public function index()
    {
        // Implementar lógica para exibir a listagem dos recursos, se necessário.
    }

    /**
     * Mostra o formulário para criar um novo recurso.
     *
     * @return void
     */
    public function create()
    {
        // Implementar lógica para mostrar o formulário de criação, se necessário.
    }

    /**
     * Armazena um novo recurso.
     *
     * @param Request $request O objeto de requisição HTTP contendo os dados de entrada.
     * @return \Illuminate\View\View A visão 'form-paciente' com a mensagem de resultado da operação.
     */
    public function store(Request $request)
    {
        $validarCampos = self::validarCampos([
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'email' => $request->email,
        ]);

        $mensagem = '';
        $arrayMensagem = [];
        
        if ($validarCampos['existeEsseCpf'] || $validarCampos['existeEsseTelefone'] || $validarCampos['existeEsseEmail']) {
            if ($validarCampos['existeEsseCpf']) {
                $arrayMensagem[] = 'CPF já existente no sistema';
            }
            if ($validarCampos['existeEsseTelefone']) {
                $arrayMensagem[] = 'Telefone já existente no sistema';
            }
            if ($validarCampos['existeEsseEmail']) {
                $arrayMensagem[] = 'Email já existente no sistema';
            }

            $mensagem = join(' e ', $arrayMensagem) . ' no sistema';
        } elseif ($request->idade < 18 && (!$request->nome_responsavel || !$request->cpf_responsavel || !$request->telefone_responsavel)) {
            $mensagem = 'Este paciente precisa de um responsável';
        } else {
            $uuid = uniqid();
            $insetValuesPaciente = [
                'nome' => $request->nome,
                'cpf' => $request->cpf,
                'data_nascimento' => $request->data_nascimento,
                'data_cadastro' => now(),
                'telefone' => $request->telefone,
                'email' => $request->email,
                'cep' => $request->cep,
                'bairro' => $request->bairro,
                'rua' => $request->rua,
                'endereco_numero' => $request->endereco_numero,
                'complemento' => $request->complemento,
                'estado' => $request->estado,
                'id_responsavel' => $uuid,
            ];
            Paciente::create($insetValuesPaciente);

            if ($request->idade < 18) {
                $insetValuesResponsavel = [
                    'uuid' => $uuid,
                    'nome' => $request->nome_responsavel,
                    'cpf' => $request->cpf_responsavel,
                    'telefone' => $request->telefone_responsavel,
                ];
                Responsavel::create($insetValuesResponsavel);
            }

            $mensagem = 'Paciente cadastrado com sucesso';
        }
        return view('form-paciente', ['mensagem' => $mensagem]);
    }

    /**
     * Exibe o recurso especificado.
     *
     * @param Paciente $paciente O objeto Paciente a ser exibido.
     * @return void
     */
    public function show(Paciente $paciente)
    {
        // Implementar lógica para exibir o paciente específico, se necessário.
    }

    /**
     * Mostra o formulário para editar o recurso especificado.
     *
     * @param Paciente $paciente O objeto Paciente a ser editado.
     * @return void
     */
    public function edit(Paciente $paciente)
    {
        // Implementar lógica para mostrar o formulário de edição, se necessário.
    }

    /**
     * Atualiza o recurso especificado no armazenamento.
     *
     * @param Request $request O objeto de requisição HTTP contendo os dados de entrada.
     * @param Paciente $paciente O objeto Paciente a ser atualizado.
     * @return void
     */
    public function update(Request $request, Paciente $paciente)
    {
        // Implementar lógica para atualizar o paciente, se necessário.
    }

    /**
     * Remove o recurso especificado do armazenamento.
     *
     * @param Paciente $paciente O objeto Paciente a ser removido.
     * @return void
     */
    public function destroy(Paciente $paciente)
    {
        // Implementar lógica para remover o paciente, se necessário.
    }

    /**
     * Valida os campos do formulário para armazenar um novo paciente.
     *
     * @param array $campos Os campos de entrada para validar.
     * @return array Um array com os resultados das validações: 'existeEsseCpf', 'existeEsseTelefone', e 'existeEsseEmail'.
     */
    public function validarCampos(array $campos): array
    {
        $existeEsseCpf = Paciente::where('cpf', $campos['cpf'])->first();
        $existeEsseTelefone = Paciente::where('telefone', $campos['telefone'])->first();
        $existeEsseEmail = Paciente::where('email', $campos['email'])->first();

        return [
            'existeEsseCpf' => (bool) $existeEsseCpf,
            'existeEsseTelefone' => (bool) $existeEsseTelefone,
            'existeEsseEmail' => (bool) $existeEsseEmail,
        ];
    }
}

