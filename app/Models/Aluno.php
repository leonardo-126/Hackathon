<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    // tabela contendo as informações dos alunos
    protected $table = "alunos";

    protected $fillable = [
        "nome",
        "user_id",
        "ultimo_acesso",
        "notificado",
        "risco"

    ];

}
