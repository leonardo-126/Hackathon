@extends('layouts.vertical', ['subtitle' => '404'])

@section('content')
<!-- Início do Container -->
<div class="container-xxl">

    <!-- Conteúdo principal -->
    <div class="row justify-content-center">
        <div class="col-xl-5">
            <div class="card">
                <div class="card-body px-3 py-5">
                    <div class="p-4">
                        <div class="mx-auto mb-4 text-center">

                            <h1 class="mb-3 fw-bold fs-60">404</h1>
                            <h2 class="fs-22 lh-base">Página não encontrada!</h2>
                            <p class="text-muted mt-1 mb-4">A página que você está tentando acessar parece ter se <br />
                                perdido na selva digital.</p>

                            <div class="text-center">
                                <a href="{{ route('any', 'index') }}" class="btn btn-success">Voltar para o Início</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- fim do card-body -->
            </div> <!-- fim do card -->

        </div> <!-- fim da coluna -->
    </div> <!-- fim da linha -->

</div>
@endsection
