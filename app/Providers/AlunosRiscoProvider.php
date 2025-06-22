<?php

namespace App\Providers;

use App\Services\AlunosRiscoService;
use Illuminate\Support\ServiceProvider;

class AlunosRiscoProvider extends ServiceProvider
{
    public function boot(AlunosRiscoService $alunosRiscoService)
    {
        // Dispara o método do Service no Provider
        $url = "http://127.0.0.1:5000/usuarioscomrisco";
        $alunosRiscoService->buscarAlunosRisco($url);

        // Lógica adicional do Provider
    }

    public function register()
    {
        // Se necessário, registre o Service no container
    }
}
