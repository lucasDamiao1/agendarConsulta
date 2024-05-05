<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

/**
 * ConsultaController é responsável por lidar com operações relacionadas a consultas.
 */
class ConsultaController extends Controller
{
    /**
     * Exibe uma listagem dos recursos.
     *
     * @param Request $request O objeto de requisição HTTP.
     * @return \Illuminate\View\View A visão 'form-consulta' com os parâmetros fornecidos.
     */
    public function index(Request $request)
    {
        $params = [
            'pacientes' => Paciente::all(),
            'medicos' => Medico::with('especialidade')->get(),
            'mensagem' => $request->mensagem,
        ];

        return view('form-consulta', $params);
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
     * @return \Illuminate\Http\RedirectResponse Redireciona para a rota 'consultas.index' com uma mensagem.
     */
    public function store(Request $request)
    {
        $validarCampos = self::validarCampos([
            'data_consulta' => $request->data_consulta,
        ]);
        
        $mensagem = '';

        if ($validarCampos['existeConsultaData']) {
            $mensagem = 'Já existe uma consulta nessa data';
        } elseif ($validarCampos['dataMenorQueHoje']) {
            $mensagem = 'Data menor que o dia de hoje';
        } else {
            $insetValues = [
                'id_paciente' => $request->id_paciente,
                'id_medico' => $request->id_medico,
                'data_consulta' => $request->data_consulta,
                'data_agendamento' => now(),
            ];

            Consulta::create($insetValues);

            $mensagem = 'Consulta agendada com sucesso!';
        }

        return redirect()->route('consultas.index', ['mensagem' => $mensagem]);
    }

    /**
     * Exibe o recurso especificado.
     *
     * @param Consulta $consulta O objeto Consulta a ser exibido.
     */
    public function show(Consulta $consulta)
    {
        // Implementar lógica para exibir a consulta específica, se necessário.
    }

    /**
     * Mostra o formulário para editar o recurso especificado.
     *
     * @param Consulta $consulta O objeto Consulta a ser editado.
     */
    public function edit(Consulta $consulta)
    {
        // Implementar lógica para mostrar o formulário de edição, se necessário.
    }

    /**
     * Atualiza o recurso especificado no armazenamento.
     *
     * @param Request $request O objeto de requisição HTTP contendo os dados de entrada.
     * @param Consulta $consulta O objeto Consulta a ser atualizado.
     */
    public function update(Request $request, Consulta $consulta)
    {
        // Implementar lógica para atualizar a consulta, se necessário.
    }

    /**
     * Remove o recurso especificado do armazenamento.
     *
     * @param Consulta $consulta O objeto Consulta a ser removido.
     */
    public function destroy(Consulta $consulta)
    {
        // Implementar lógica para remover a consulta, se necessário.
    }

    /**
     * Valida os campos do formulário para armazenar ou atualizar uma consulta.
     *
     * @param array $campos Os campos de entrada para validar.
     * @return array Um array com resultados das validações: 'existeConsultaData' e 'dataMenorQueHoje'.
     */
    public function validarCampos(array $campos): array
    {
        $existeConsultaData = Consulta::where('data_consulta', $campos['data_consulta'])->first();

        $dataMenorQueHoje = $campos['data_consulta'] < now();

        return [
            'existeConsultaData' => (bool) $existeConsultaData,
            'dataMenorQueHoje' => $dataMenorQueHoje,
        ];
    }
}

