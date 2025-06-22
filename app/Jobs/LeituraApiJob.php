<?php


namespace App\Jobs;

use App\Services\AlunosRiscoService;
use Illuminate\Queue\Jobs\Job;

class LeituraApiJob implements Job
{
    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function handle(AlunosRiscoService $alunosRiscoService)
    {
        // Dispara o método do Service dentro do Job
        $alunosRiscoService->buscarAlunosRisco($this->url);

        // Lógica adicional do Job, como registro de logs, etc.
    }
}
