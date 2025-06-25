@extends('layouts.base', ['subtitle' => 'Redefinir Senha'])

@section('body-attribuet')
class="authentication-bg"
@endsection

@section('content')
<div class="account-pages py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <div class="text-center">
                            <div class="mx-auto mb-4 text-center auth-logo">
                                <a href="{{ route('any', 'index') }}" class="logo-dark">
                                    <img src="/images/logo-dark.png" height="60" alt="logo escuro">
                                </a>
                            </div>
                            <h4 class="fw-bold text-dark mb-2">Redefinir Senha</h4>
                            <p class="text-muted">Informe seu endereço de e-mail e enviaremos instruções para redefinir sua senha.</p>
                        </div>
                        <form action="{{ route('any', 'index') }}" class="mt-4">
                            <div class="mb-3">
                                <label for="email" class="form-label">Endereço de E-mail</label>
                                <input type="email" class="form-control" id="email"
                                    placeholder="Digite seu e-mail">
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-dark btn-lg fw-medium" type="submit">
                                    Redefinir Senha
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <p class="text-center mt-4 text-white text-opacity-50">
                    Voltar para 
                    <a href="{{ route('second', ['auth', 'signup']) }}"
                        class="text-decoration-none text-white fw-bold">Entrar</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
