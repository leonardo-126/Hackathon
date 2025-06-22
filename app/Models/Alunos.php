<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Alunos extends Model
{
    //
    protected $table = "alunos";
    protected $fillable = [
        "nome",
        "ultimo_acesso",
        "notificado",
        "risco"
    ];
}
