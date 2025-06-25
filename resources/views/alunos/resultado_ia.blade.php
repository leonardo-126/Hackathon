@extends('layouts.vertical', ['subtitle' => 'Resultado da Avaliação IA'])

@section('content')
<div class="container mt-4">
    <h2>Resultado da Avaliação IA</h2>
    <div class="card mb-4">
        <div class="card-body">
            <strong>Nome:</strong> {{ $aluno->nome }}<br>
            <strong>User ID:</strong> {{ $aluno->user_id }}<br>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Avaliação Atual</h5>
        </div>
        <div class="card-body">
            @if(is_array($resultado) && isset($resultado[0]))
                <strong>Nome:</strong> {{ $resultado[0]['nome'] ?? '-' }}<br>
                <strong>Nota:</strong> {{ $resultado[0]['nota'] ?? '-' }}<br>
                <strong>Relatório:</strong><br>
                <div class="border rounded p-2 mb-2 bg-light">{{ $resultado[0]['relatorio'] ?? '-' }}</div>
                <strong>Avaliação:</strong><br>
                <div class="border rounded p-2 bg-light">{{ $resultado[0]['avaliacao'] ?? '-' }}</div>
            @else
                <span class="text-danger">Não foi possível obter a avaliação.</span>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Histórico de Avaliações</h5>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Data/Hora</th>
                        <th>Nota</th>
                        <th>Relatório</th>
                        <th>Avaliação</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($historico as $av)
                        <tr>
                            <td>{{ $av->created_at->format('d/m/Y H:i:s') }}</td>
                            <td>{{ $av->nota ?? '-' }}</td>
                            <td>{{ $av->relatorio ?? '-' }}</td>
                            <td>{{ $av->avaliacao ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Nenhuma avaliação registrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <a href="{{ route('alunos.acessos', $aluno->id) }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection 