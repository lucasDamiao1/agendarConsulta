<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Especialidade é o modelo responsável por representar uma especialidade médica no sistema.
 *
 * @property int $id O ID da especialidade.
 * @property string $codigo O código da especialidade.
 * @property string $nome O nome da especialidade.
 */
class Especialidade extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa.
     *
     * @var array<string>
     */
    protected $fillable = [
        'codigo',
        'nome',
    ];
}
