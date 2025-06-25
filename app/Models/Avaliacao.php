<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $fillable = [
        'aluno_id',
        'nome',
        'nota',
        'avaliacao',
        'relatorio',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
