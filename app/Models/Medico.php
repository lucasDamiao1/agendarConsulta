<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Medico é o modelo responsável por representar um médico no sistema.
 *
 * @property int $id O ID do médico.
 * @property string $crm O número de CRM do médico.
 * @property string $nome O nome do médico.
 * @property int $id_especialidade O ID da especialidade do médico.
 * @property Especialidade $especialidade A especialidade associada ao médico.
 */
class Medico extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa.
     *
     * @var array<string>
     */
    protected $fillable = [
        'crm',
        'nome',
        'id_especialidade',
    ];

    /**
     * Estabelece uma relação com o modelo `Especialidade`.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class, 'id_especialidade', 'id');
    }
}
