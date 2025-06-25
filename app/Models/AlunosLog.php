<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlunosLog extends Model
{
    protected $fillable = [
        'aluno_id',
        'user_id',
        'nome',
        'ultimo_acesso',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
