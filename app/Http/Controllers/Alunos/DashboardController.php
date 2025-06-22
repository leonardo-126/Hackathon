<?php

namespace App\Http\Controllers\Alunos;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Services\AlunosRiscoService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $alunoService;

    public function __construct(AlunosRiscoService $alunoService) 
    {
        $this->alunoService = $alunoService;
    }

    public function index()
    {
        $usuariosEmRisco = $this->alunoService->contarAlunosEmRisco();

        return view('index', compact('usuariosEmRisco'));
    }

    public function indexPorcentage()
    {
        $usuariosEmRisco = Aluno::all()->count();

        return view('index', compact('usuariosEmRisco'));
    }

}
