@extends('layouts.vertical', ['subtitle' => 'Acessos do Aluno'])

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container mt-4">
    <h2>Acessos do Aluno</h2>
    <div class="card mb-4">
        <div class="card-body">
            <strong>Nome:</strong> {{ $aluno->nome }}<br>
            <strong>User ID:</strong> {{ $aluno->user_id }}<br>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Histórico de Acessos</h5>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Data/Hora do Acesso</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($log->ultimo_acesso)->format('d/m/Y H:i:s') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="1">Nenhum acesso registrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <form method="POST" action="{{ route('alunos.avaliarIa', $aluno->id) }}" class="mb-3">
        @csrf
        <button type="submit" class="btn btn-primary">Avaliar com IA</button>
    </form>
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Histórico de Avaliações</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Data/Hora</th>
                            <th>Nota</th>
                            <th>Relatório</th>
                            <th>Avaliação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($historico as $av)
                            <tr>
                                <td>{{ $av->created_at->format('d/m/Y H:i:s') }}</td>
                                <td>{{ $av->nota ?? '-' }}</td>
                                <td>{{ $av->relatorio ?? '-' }}</td>
                                <td>{{ $av->avaliacao ?? '-' }}</td>
                                <td>
                                    <div class="d-grid gap-2 d-md-block">
                                        <a href="{{ route('avaliacao.pdf', $av->id) }}" class="btn btn-sm btn-danger">Exportar PDF</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Nenhuma avaliação registrada.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3 mb-3">Voltar</a>
</div>
@endsection 