<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Consulta é o modelo responsável por representar uma consulta no sistema.
 *
 * @property int $id O ID da consulta.
 * @property int $id_paciente O ID do paciente relacionado à consulta.
 * @property int $id_medico O ID do médico relacionado à consulta.
 * @property \Illuminate\Support\Carbon $data_consulta A data da consulta.
 * @property \Illuminate\Support\Carbon $data_agendamento A data do agendamento da consulta.
 */
class Consulta extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa.
     *
     * @var array<string>
     */
    protected $fillable = [
        'id_paciente',
        'id_medico',
        'data_consulta',
        'data_agendamento',
    ];

    /**
     * Estabelece uma relação com o modelo `Paciente`.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    /**
     * Estabelece uma relação com o modelo `Medico`.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'id_medico');
    }
}
