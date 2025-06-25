@extends('layouts.vertical', ['subtitle' => 'Acessos do Aluno'])

@section('content')
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
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection 