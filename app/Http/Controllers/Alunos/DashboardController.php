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

    public function index(Request $request)
    {
        $filtros = [
            'id' => $request->get('id_busca'),
            'nome' => $request->get('nome_busca'),
            'risco' => $request->get('risco_busca'),
        ];

        $usuariosEmRisco = $this->alunoService->contarAlunosEmRisco();
        $porcentage = $this->alunoService->alunosRiscoPortcentage();
        $dadosRisco = $this->alunoService->alunosRiscoPortcentage();
        $usuariosEmAltoRisco = $this->alunoService->AlunosEmAltoRiscoCount();
        $usuariosAltoRiscoPortcentage = $this->alunoService->alunosAltoRiscoPortcentage();
        
        $alunos = $this->alunoService->listarAlunosPaginados($filtros)->onEachSide(0)
                    ->withQueryString();
        
        return view('index', compact('usuariosEmRisco', 'porcentage', 'alunos', 'usuariosEmAltoRisco', 'usuariosAltoRiscoPortcentage'));
    }

}
