@extends('layouts.vertical', ['subtitle' => 'Painel'])

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<form method="POST" action="{{ route('dashboard.atualizarApi') }}" class="mb-3">
    @csrf
    <button type="submit" class="btn btn-success">
        Atualizar Dados da API
    </button>
</form>

@include('layouts.partials.page-title', ['title' => 'Hackathon', 'subtitle' => 'Painel'])

@php
    $usuariosEmRisco = $usuariosEmRisco ?? 0;
    $porcentage = $porcentage ?? 0;
    $usuariosEmAltoRisco = $usuariosEmAltoRisco ?? 0;
    $usuariosAltoRiscoPortcentage = $usuariosAltoRiscoPortcentage ?? 0;
    $alunos = $alunos ?? collect([]);
@endphp

<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-md bg-primary bg-opacity-10 rounded-circle">
                            <iconify-icon icon="solar:users-group-two-rounded-outline"
                                class="fs-32 text-primary avatar-title"></iconify-icon>
                        </div>
                    </div>
                    <div class="col-6 text-end">
                        <p class="text-muted mb-0 text-truncate">Alunos</p>
                        <h3 class="text-dark mt-2 mb-0">{{ number_format($usuariosEmRisco, 0, ',', '.') }}</h3>
                    </div>
                </div>
            </div>
            <div class="card-footer border-0 py-2 bg-light bg-opacity-50 mx-2 mb-2">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-danger"><i class="bx bxs-up-arrow fs-12"></i> {{ $porcentage }}%</span>
                        <span class="text-muted ms-1 fs-12">Risco e Alto Risco</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-md bg-primary bg-opacity-10 rounded-circle">
                            <iconify-icon icon="solar:users-group-two-rounded-outline"
                                class="fs-32 text-primary avatar-title"></iconify-icon>
                        </div>
                    </div>
                    <div class="col-6 text-end">
                        <p class="text-muted mb-0 text-truncate">Alto Risco</p>
                        <h3 class="text-dark mt-2 mb-0">{{ $usuariosEmAltoRisco }}</h3>
                    </div>
                </div>
            </div>
            <div class="card-footer border-0 py-2 bg-light bg-opacity-50 mx-2 mb-2">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-danger"><i class="bx bxs-up-arrow fs-12"></i>{{ $usuariosAltoRiscoPortcentage }}</span>
                        <span class="text-muted ms-1 fs-12">Usuarios de Alto Risco</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Alunos Monitorados</h4>
                <p class="text-muted mb-0">Utilize os campos abaixo para filtrar os resultados.</p>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('dashboard') }}" class="row gy-2 gx-2 align-items-center mb-4">
                    <div class="col-xl-3 col-sm-6">
                        <label for="id_busca" class="visually-hidden">User ID</label>
                        <input type="text" class="form-control" id="id_busca" name="id_busca" placeholder="Buscar por User ID..." value="{{ request('id_busca') }}">
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <label for="nome_busca" class="visually-hidden">Nome</label>
                        <input type="text" class="form-control" id="nome_busca" name="nome_busca" placeholder="Buscar por Nome..." value="{{ request('nome_busca') }}">
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <label for="data_busca" class="visually-hidden">Último Acesso</label>
                        <input type="date" class="form-control" id="data_busca" name="data_busca" placeholder="Buscar por Data..." value="{{ request('data_busca') }}">
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <label for="risco_busca" class="visually-hidden">Risco</label>
                        <select class="form-select" id="risco_busca" name="risco_busca">
                            <option value="">Todos os Riscos</option>
                            <option value="1" @if(request('risco_busca') == 1) selected @endif>Baixo Risco</option>
                            <option value="2" @if(request('risco_busca') == 2) selected @endif>Risco</option>
                            <option value="3" @if(request('risco_busca') == 3) selected @endif>Alto Risco</option>
                        </select>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                    </div>
                </form>

                <div class="table-responsive table-centered">
                    <table class="table mb-0">
                        <thead class="bg-light bg-opacity-50">
                            <tr>
                                <th class="border-0 py-2">Data</th>
                                <th class="border-0 py-2">Usuário ID</th>
                                <th class="border-0 py-2">Risco</th>
                                <th class="border-0 py-2">Nome</th>
                                <th class="border-0 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alunos as $aluno)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($aluno->ultimo_acesso)->format('d M, Y') }}</td>
                                <td>{{ $aluno->user_id }}</td>
                                <td>
                                    @if ($aluno->risco == 1)
                                        <span class="badge badge-soft-success">Baixo Risco</span>
                                    @elseif ($aluno->risco == 2)
                                        <span class="badge badge-soft-warning">Risco</span>
                                    @else
                                        <span class="badge badge-soft-danger">Alto Risco</span>
                                    @endif
                                </td>
                                <td>{{ $aluno->nome }}</td>
                                <td>
                                    <a href="{{ route('alunos.acessos', $aluno->id) }}" class="btn btn-sm btn-primary">Ver acessos</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- fim da tabela responsiva -->

                <div class="align-items-center justify-content-between row g-0 text-center text-sm-start p-3 border-top mt-3">
                    <div class="col-sm">
                        <div class="text-muted">
                            Mostrando <span class="fw-semibold">{{ $alunos->firstItem() ?? 0 }}</span> a <span class="fw-semibold">{{ $alunos->lastItem() ?? 0 }}</span> de <span class="fw-semibold">{{ $alunos->total() ?? 0 }}</span> usuários
                        </div>
                    </div>
                    <div class="col-sm-auto mt-3 mt-sm-0">
                        {{ $alunos->links() }}
                    </div>
                </div>
            </div> <!-- fim do card-body -->
        </div> <!-- fim do card -->
    </div> <!-- fim da coluna -->
</div> <!-- fim da linha -->

<div class="row">
    <div class="col-lg-6">
        <div class="card card-height-100">
            <div class="card-header d-flex align-items-center justify-content-between gap-2">
                <h4 class="card-title flex-grow-1">Páginas Principais</h4>
                <div>
                    <button type="button" class="btn btn-sm btn-outline-light">Tudo</button>
                    <button type="button" class="btn btn-sm btn-outline-light">1M</button>
                    <button type="button" class="btn btn-sm btn-outline-light">6M</button>
                    <button type="button" class="btn btn-sm btn-outline-light active">1A</button>
                </div>
            </div>

            <div class="card-body pt-0">
                <div dir="ltr">
                    <div id="dash-performance-chart" class="apex-charts"></div>
                </div>
            </div>

        </div> <!-- fim do card -->
    </div> <!-- fim da coluna -->
</div> <!-- fim da linha -->

@endsection

@section('scripts')
@vite(['resources/js/pages/dashboard.js'])
@endsection
