<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Responsavel é o modelo responsável por representar um responsável no sistema.
 *
 * @property int $id O ID do responsável.
 * @property string $uuid O UUID do responsável.
 * @property string $nome O nome do responsável.
 * @property string $cpf O CPF do responsável.
 * @property string $telefone O número de telefone do responsável.
 */
class Responsavel extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada a este modelo.
     *
     * @var string
     */
    protected $table = 'responsavel';
    
    /**
     * Os atributos que podem ser preenchidos em massa.
     *
     * @var array<string>
     */
    protected $fillable = [
        'uuid',
        'nome',
        'cpf',
        'telefone',
    ];
}
