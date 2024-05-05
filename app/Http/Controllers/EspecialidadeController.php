<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use Illuminate\Http\Request;

/**
 * EspecialidadeController é responsável por lidar com operações relacionadas a especialidades.
 */
class EspecialidadeController extends Controller
{
    /**
     * Exibe uma listagem dos recursos.
     *
     * @return \Illuminate\View\View A visão 'form-especialidade'.
     */
    public function index()
    {
        return view('form-especialidade');
    }

    /**
     * Mostra o formulário para criar um novo recurso.
     *
     * @return string Uma mensagem indicando a ação de criar um novo recurso.
     */
    public function create()
    {
        return 'create';
    }

    /**
     * Armazena um novo recurso.
     *
     * @param Request $request O objeto de requisição HTTP contendo os dados de entrada.
     * @return \Illuminate\View\View A visão 'form-especialidade' com os resultados da operação.
     */
    public function store(Request $request)
    {
        $validarCampos = self::validarCampos([
            'codigo' => $request->codigo,
            'nome' => $request->nome,
        ]);

        $divergente = false;
        $mensagem = '';

        if ($validarCampos['existeEsseCodigo'] || $validarCampos['existeEsseNome']) {
            $divergente = true;
            $arrayMensagem = [];
            if ($validarCampos['existeEsseCodigo']) {
                $arrayMensagem[] = "Código já existente no sistema";
            }
            if ($validarCampos['existeEsseNome']) {
                $arrayMensagem[] = "Nome já existente no sistema";
            }
            $mensagem = join(' e ', $arrayMensagem);
        } else {
            $insetValues = [
                'codigo' => $request->codigo,
                'nome' => $request->nome,
            ];

            Especialidade::create($insetValues);

            $mensagem = "Especialidade cadastrada com sucesso";
        }

        return view('form-especialidade', [
            'divergente' => $divergente,
            'mensagem' => $mensagem,
        ]);
    }

    /**
     * Exibe o recurso especificado.
     *
     * @param Especialidade $especialidade O objeto Especialidade a ser exibido.
     */
    public function show(Especialidade $especialidade)
    {
        // Implementar lógica para exibir a especialidade específica, se necessário.
    }

    /**
     * Mostra o formulário para editar o recurso especificado.
     *
     * @param Especialidade $especialidade O objeto Especialidade a ser editado.
     */
    public function edit(Especialidade $especialidade)
    {
        // Implementar lógica para mostrar o formulário de edição, se necessário.
    }

    /**
     * Atualiza o recurso especificado no armazenamento.
     *
     * @param Request $request O objeto de requisição HTTP contendo os dados de entrada.
     * @param Especialidade $especialidade O objeto Especialidade a ser atualizado.
     */
    public function update(Request $request, Especialidade $especialidade)
    {
        // Implementar lógica para atualizar a especialidade, se necessário.
    }

    /**
     * Remove o recurso especificado do armazenamento.
     *
     * @param Especialidade $especialidade O objeto Especialidade a ser removido.
     */
    public function destroy(Especialidade $especialidade)
    {
        // Implementar lógica para remover a especialidade, se necessário.
    }

    /**
     * Valida os campos do formulário para armazenar ou atualizar uma especialidade.
     *
     * @param array $campos Os campos de entrada para validar.
     * @return array Um array com os resultados das validações: 'existeEsseCodigo' e 'existeEsseNome'.
     */
    public function validarCampos(array $campos): array
    {
        $existeEsseCodigo = Especialidade::where('codigo', $campos['codigo'])->first();
        $existeEsseNome = Especialidade::where('nome', $campos['nome'])->first();

        return [
            'existeEsseCodigo' => (bool) $existeEsseCodigo,
            'existeEsseNome' => (bool) $existeEsseNome,
        ];
    }
}

