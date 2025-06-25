<?php

use App\Http\Controllers\Alunos\DashboardController;
use App\Http\Controllers\RoutingController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::group(['middleware' => 'auth'], function () {
    // Rota principal para o dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Botão para rodar a API manualmente
    Route::post('/dashboard/atualizar-api', [DashboardController::class, 'atualizarApi'])->name('dashboard.atualizarApi');

    // Rota para exibir os acessos de um aluno
    Route::get('/alunos/{id}/acessos', [DashboardController::class, 'acessos'])->name('alunos.acessos');

    // Rotas do RoutingController para outras páginas
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});
