@extends('layouts.base', ['subtitle' => 'Página Não Encontrada - 404'])

@section('body-attribuet')
class="authentication-bg"
@endsection

@section('content')
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="card auth-card">
                    <div class="card-body p-0">
                        <div class="row align-items-center g-0">
                            <div class="col">
                                <div class="p-4">
                                    <div class="mx-auto mb-4 text-center">
                                        <div class="mx-auto text-center auth-logo">
                                            <a href="{{ route('any', 'index') }}" class="logo-dark">
                                                <img src="/images/logo-dark.png" height="32" alt="logo escuro">
                                            </a>

                                            <a href="{{ route('any', 'index') }}" class="logo-light">
                                                <img src="/images/logo-light.png" height="28" alt="logo claro">
                                            </a>
                                        </div>

                                        <img src="/images/404.svg" alt="imagem erro 404" height="250"
                                            class="mt-5 mb-3" />

                                        <h2 class="fs-22 lh-base">Página Não Encontrada!</h2>
                                        <p class="text-muted mt-1 mb-4">A página que você está tentando acessar parece ter<br />
                                            se perdido na selva digital.</p>

                                        <div class="text-center">
                                            <a href="{{ route('any', 'index') }}" class="btn btn-danger">Voltar para o Início</a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- fim da coluna -->
                        </div> <!-- fim da linha -->

                    </div> <!-- fim do card-body -->
                </div> <!-- fim do card -->

            </div> <!-- fim da coluna -->
        </div> <!-- fim da linha -->
    </div>
</div>
@endsection
