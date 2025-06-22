<?php
namespace App\Services;

use App\Models\Aluno;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Laravel\Pail\ValueObjects\Origin\Console;

class AlunosRiscoService
{
    public function buscarAlunosRisco($url)
    {
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
                
                // Processamento dos alunos e salvando no banco
                Aluno::create([
                    'nome' => $aluno['nome'],
                    'ultimo_acesso' => $aluno['ultimoacesso'],
                    'notificado' => 0,
                    'risco' => $risco,
                ]);
            }
        } else {
            dd("nao passou ");
        }
    }
    public function contarAlunosEmRisco()
    {
        return Aluno::all()->count();
    }
    public function alunosRiscoPortcentage()
    {
        $date = Carbon::now();

        $inicioMesAtual = $date->copy()->startOfMonth();
        $fimMesAtual = $date->copy()->endOfMonth();

        $inicioMesPassado = $date->copy()->subMonth()->startOfMonth();
        $fimMesPassado = $date->copy()->subMonth()->endOfMonth();

        $atual = Aluno::all()
            ->whereBetween('ultimo_acesso', [$inicioMesAtual, $fimMesAtual])
            ->count();

        $passado = Aluno::all()
            ->whereBetween('ultimo_acesso', [$inicioMesPassado, $fimMesPassado])
            ->count();

        if ($passado == 0) {
            return $atual > 0 ? 100 : 0; // Evita divisão por zero
        }    

        $crescimento = (($atual - $passado) / $passado) * 100;

        return Aluno::all()->count();
    }
}
