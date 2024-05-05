<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Paciente é o modelo responsável por representar um paciente no sistema.
 *
 * @property int $id O ID do paciente.
 * @property string $nome O nome do paciente.
 * @property string $cpf O CPF do paciente.
 * @property \Illuminate\Support\Carbon $data_nascimento A data de nascimento do paciente.
 * @property \Illuminate\Support\Carbon $data_cadastro A data de cadastro do paciente.
 * @property string $telefone O número de telefone do paciente.
 * @property string $email O endereço de email do paciente.
 * @property string $cep O CEP do paciente.
 * @property string $bairro O bairro onde o paciente reside.
 * @property string $rua A rua onde o paciente reside.
 * @property string $endereco_numero O número do endereço do paciente.
 * @property string $complemento O complemento do endereço do paciente.
 * @property string $estado O estado onde o paciente reside.
 * @property int|null $id_responsavel O ID do responsável pelo paciente (se aplicável).
 */
class Paciente extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'data_cadastro',
        'telefone',
        'email',
        'cep',
        'bairro',
        'rua',
        'endereco_numero',
        'complemento',
        'estado',
        'id_responsavel',
    ];
}
