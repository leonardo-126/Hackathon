<?php
namespace App\Services;

use App\Models\Aluno;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Laravel\Pail\ValueObjects\Origin\Console;

class AlunosRiscoService
{
    public function buscarAlunosRisco($url)
    {
        if (Cache::has('sincronizacao_alunos_lock')) {
            return;
        }

        $response = Http::get($url);
        
        if ($response->successful()) {
            $data = $response->json();
            foreach ($data as $aluno) {
                $ultimoAcesso = Carbon::parse($aluno['ultimoacesso']);
                $diasSemAcesso = $ultimoAcesso->diffInDays(Carbon::now());

                // Definir o risco baseado nos dias sem acesso
                if ($diasSemAcesso <= 7) {
                    $risco = 1; // Baixo risco
                } elseif ($diasSemAcesso <= 14) {
                    $risco = 2; // Risco
                } else {
                    $risco = 3; // Alto risco
                }

                // Busca o aluno pelo user_id
                $alunoModel = Aluno::where('user_id', $aluno['id'])->first();
                $novoUltimoAcesso = $aluno['ultimoacesso'];

                if ($alunoModel) {
                    // Busca o último log desse aluno
                    $ultimoLog = \App\Models\AlunosLog::where('aluno_id', $alunoModel->id)
                        ->orderByDesc('created_at')
                        ->first();

                    if (!$ultimoLog) {
                        // Nunca teve log, cria o primeiro
                        \App\Models\AlunosLog::create([
                            'aluno_id' => $alunoModel->id,
                            'user_id' => $alunoModel->user_id,
                            'nome' => $alunoModel->nome,
                            'ultimo_acesso' => $novoUltimoAcesso,
                        ]);
                    } else {
                        // Já tem log, compara o ultimo_acesso
                        $ultimoAcessoLog = \Carbon\Carbon::parse($ultimoLog->ultimo_acesso)->format('Y-m-d H:i:s');
                        $novoUltimoAcessoFormatado = \Carbon\Carbon::parse($novoUltimoAcesso)->format('Y-m-d H:i:s');
                        if ($ultimoAcessoLog !== $novoUltimoAcessoFormatado) {
                            \App\Models\AlunosLog::create([
                                'aluno_id' => $alunoModel->id,
                                'user_id' => $alunoModel->user_id,
                                'nome' => $alunoModel->nome,
                                'ultimo_acesso' => $novoUltimoAcesso,
                            ]);
                        }
                    }
                } else {
                    // Se não existe, cria o aluno e já salva o log
                    $novoAluno = Aluno::create([
                        'user_id' => $aluno['id'],
                        'nome' => $aluno['nome'],
                        'ultimo_acesso' => $aluno['ultimoacesso'],
                        'notificado' => 0,
                        'risco' => $risco,
                    ]);
                    \App\Models\AlunosLog::create([
                        'aluno_id' => $novoAluno->id,
                        'user_id' => $novoAluno->user_id,
                        'nome' => $novoAluno->nome,
                        'ultimo_acesso' => $novoAluno->ultimo_acesso,
                    ]);
                }

                // Atualiza se já existir user_id, caso contrário cria novo
                Aluno::updateOrCreate(
                    ['user_id'      => $aluno['id']],  // condição de busca
                    [
                        'nome'          => $aluno['nome'],
                        'ultimo_acesso' => $aluno['ultimoacesso'],
                        'notificado'    => 0,
                        'risco'         => $risco,
                    ]
                );
            }
            
            Cache::put('sincronizacao_alunos_lock', true, now()->addHours(12));
        } else {
        }
    }
    public function contarAlunosEmRisco()
    {
        return Aluno::all()->count();
    }
    public function alunosRiscoPortcentage()
    {
        $total = Aluno::count();

        if ($total === 0) {
            return 0;
        }

        $emRisco = Aluno::whereIn('risco', [2, 3])->count();

        $porcentagem = ($emRisco / $total) * 100;

        return round($porcentagem, 2); //arredonda para duas casa
    }
    public function AlunosEmAltoRiscoCount(): int
    {
        return Aluno::where('risco', 3)->count();
    }
    public function alunosAltoRiscoPortcentage()
    {
        $total = Aluno::count();

        if ($total === 0) {
            return 0;
        }

        $emRisco = Aluno::whereIn('risco', [3])->count();

        $porcentagem = ($emRisco / $total) * 100;

        return round($porcentagem, 2); //arredonda para duas casa
    }

    /**
     * Lista os alunos de forma paginada.
     *
     * @param int $porPagina A quantidade de itens por página.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function listarAlunosPaginados($filtros = [], $porPagina = 15): LengthAwarePaginator
    {
        $query = Aluno::query();

        // Filtro por user_id
        if (!empty($filtros['id'])) {
            $query->where('user_id', $filtros['id']);
        }

        // Filtro por Nome (LIKE)
        if (!empty($filtros['nome'])) {
            $query->where('nome', 'like', '%' . $filtros['nome'] . '%');
        }

        // Filtro por Risco
        if (!empty($filtros['risco'])) {
            $query->where('risco', $filtros['risco']);
        }

        // Filtro por Data de Último Acesso
        if (!empty($filtros['data'])) {
            $query->whereDate('ultimo_acesso', $filtros['data']);
        }

        return $query->orderBy('ultimo_acesso', 'desc')->paginate($porPagina);
    }
}
