<?php
namespace App\Services;

use App\Models\Aluno;
use Illuminate\Support\Facades\Http;

class AlunosRiscoService
{
    public function buscarAlunosRisco($url)
    {
        $response = Http::get($url);
        
        if ($response->successful()) {
            $data = $response->json();
            foreach ($data as $aluno) {
                // Processamento dos alunos e salvando no banco
                Aluno::create([
                    'nome' => $aluno['nome'],
                    'ultimo_acesso' => $aluno['ultimoacesso'],
                    'notificado' => 0,
                ]);
            }
        } else {
            // Tratar erro da API
        }
    }
}
