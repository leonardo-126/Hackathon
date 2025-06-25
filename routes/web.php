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

    // Rota para avaliar o aluno com IA
    Route::post('/alunos/{id}/avaliar', [DashboardController::class, 'avaliarIa'])->name('alunos.avaliarIa');

    // Rota para exportar histórico de avaliações em PDF
    Route::get('/alunos/{id}/avaliacoes/pdf', [DashboardController::class, 'exportarAvaliacoesPdf'])->name('alunos.avaliacoes.pdf');

    // Rota para exportar PDF de uma avaliação específica
    Route::get('/avaliacoes/{avaliacao}/pdf', [DashboardController::class, 'exportarAvaliacaoPdf'])->name('avaliacao.pdf');

    // Rotas do RoutingController para outras páginas
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});
