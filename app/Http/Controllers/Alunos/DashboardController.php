<?php

namespace App\Http\Controllers\Alunos;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\Avaliacao;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

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
            'data' => $request->get('data_busca'),
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

    public function atualizarApi(Request $request)
    {
        // Limpa o cache antes de rodar a API
        Cache::forget('sincronizacao_alunos_lock');
        //dd('teste');
        $url = config('services.alunos_api.url', 'http://localhost:5000/usuarioscomrisco');
        $this->alunoService->buscarAlunosRisco($url);
        return redirect()->route('dashboard')->with('success', 'Dados atualizados com sucesso!');
    }

    public function acessos($id)
    {
        $aluno = Aluno::findOrFail($id);
        $logs = $aluno->logs()->orderByDesc('ultimo_acesso')->get();
        $historico = $aluno->avaliacaos()->orderByDesc('created_at')->get();
        return view('alunos.acessos', compact('aluno', 'logs', 'historico'));
    }

    public function avaliarIa($id)
    {
        $aluno = Aluno::findOrFail($id);
        $logs = $aluno->logs()->orderBy('ultimo_acesso')->get();

        $dados = [
            'aluno_id' => $aluno->id,
            'nome' => $aluno->nome,
            'user_id' => $aluno->user_id,
            'logs' => $logs->map(function($log) {
                return [
                    'ultimo_acesso' => $log->ultimo_acesso,
                ];
            })->toArray(),
        ];

        $response = Http::post('http://localhost:5000/gerar_relatorio', [$dados]);
        $resultado = $response->json();

        // Salvar resultado na tabela Avaliacao
        if (is_array($resultado) && isset($resultado[0])) {
            $r = $resultado[0];
            Avaliacao::create([
                'aluno_id' => $aluno->id,
                'nome' => $r['nome'] ?? $aluno->nome,
                'nota' => $r['nota'] ?? null,
                'avaliacao' => $r['avaliacao'] ?? '',
                'relatorio' => $r['relatorio'] ?? null,
            ]);
        }

        // Redireciona para a tela de acessos com mensagem de sucesso
        return redirect()->route('alunos.acessos', $aluno->id)->with('success', 'Avaliação realizada com sucesso!');
    }


    public function exportarAvaliacaoPdf($avaliacaoId)
    {
        $avaliacao = Avaliacao::findOrFail($avaliacaoId);
        $aluno = $avaliacao->aluno;
        $pdf = \PDF::loadView('alunos.avaliacao_pdf', compact('aluno', 'avaliacao'));
        $nomeArquivo = 'avaliacao_' . $aluno->user_id . '_' . $avaliacao->id . '.pdf';
        return $pdf->download($nomeArquivo);
    }

}
