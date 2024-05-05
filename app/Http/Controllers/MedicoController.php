<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use App\Models\Medico;
use Illuminate\Http\Request;

/**
 * MedicoController é responsável por lidar com operações relacionadas a médicos.
 */
class MedicoController extends Controller
{
    /**
     * Exibe uma listagem dos recursos.
     *
     * @param Request $request O objeto de requisição HTTP.
     * @return \Illuminate\View\View A visão 'form-medico' com os dados necessários.
     */
    public function index(Request $request)
    {
        $especialidades = Especialidade::all();
        return view('form-medico', [
            'especialidades' => $especialidades,
            'mensagem' => $request->mensagem ?: '',
        ]);
    }

    /**
     * Mostra o formulário para criar um novo recurso.
     */
    public function create()
    {
        // Implementar lógica para mostrar o formulário de criação, se necessário.
    }

    /**
     * Armazena um novo recurso.
     *
     * @param Request $request O objeto de requisição HTTP contendo os dados de entrada.
     * @return \Illuminate\Http\RedirectResponse Redireciona para a rota 'medicos.index' com uma mensagem.
     */
    public function store(Request $request)
    {
        $insetValues = [
            'crm' => $request->crm,
            'nome' => $request->nome,
            'id_especialidade' => $request->especialidade,
        ];

        Medico::create($insetValues);

        return redirect()->route('medicos.index', ['mensagem' => 'Médico cadastrado com sucesso!']);
    }

    /**
     * Exibe o recurso especificado.
     *
     * @param Medico $medico O objeto Medico a ser exibido.
     */
    public function show(Medico $medico)
    {
        // Implementar lógica para exibir o médico específico, se necessário.
    }

    /**
     * Mostra o formulário para editar o recurso especificado.
     *
     * @param Medico $medico O objeto Medico a ser editado.
     */
    public function edit(Medico $medico)
    {
        // Implementar lógica para mostrar o formulário de edição, se necessário.
    }

    /**
     * Atualiza o recurso especificado no armazenamento.
     *
     * @param Request $request O objeto de requisição HTTP contendo os dados de entrada.
     * @param Medico $medico O objeto Medico a ser atualizado.
     */
    public function update(Request $request, Medico $medico)
    {
        // Implementar lógica para atualizar o médico, se necessário.
    }

    /**
     * Remove o recurso especificado do armazenamento.
     *
     * @param Medico $medico O objeto Medico a ser removido.
     */
    public function destroy(Medico $medico)
    {
        // Implementar lógica para remover o médico, se necessário.
    }

    /**
     * Retorna uma lista de médicos por especialidade especificada.
     *
     * @param string $especialidade O nome da especialidade (padrão: 'Pediatra').
     * @return array Uma lista de médicos com a especialidade especificada.
     */
    public function getMedicoPorEspecialidade(string $especialidade = 'Pediatra'): array
    {
        return Medico::whereHas('especialidade', function ($query, $especialidade) {
            $query->where('nome', $especialidade);
        })->with('especialidade')->get()->toArray();
    }
}

