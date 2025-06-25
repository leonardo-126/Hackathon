@extends('layouts.base', ['subtitle' => 'Cadastro'])

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
                                    <img src="/images/logo-dark.png" height="80" alt="logo escuro">
                                </a>

                            </div>
                            <h4 class="fw-bold text-dark mb-2">Cadastro</h4>
                        </div>

                        <form action="{{ route('any', 'index') }}" class="mt-4">
                            <div class="mb-3">
                                <label class="form-label" for="example-name">Nome</label>
                                <input type="text" id="example-name" name="example-name" class="form-control"
                                    placeholder="Digite seu nome">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="example-email">E-mail</label>
                                <input type="email" id="example-email" name="example-email" class="form-control"
                                    placeholder="Digite seu e-mail">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="example-password">Senha</label>
                                <input type="password" id="example-password" class="form-control"
                                    placeholder="Digite sua senha">
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                    <label class="form-check-label" for="checkbox-signin">Aceito os Termos e Condições</label>
                                </div>
                            </div>

                            <div class="mb-1 text-center d-grid">
                                <button class="btn btn-dark btn-lg fw-medium" type="submit">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <p class="text-center mt-4 text-white text-opacity-50">
                    Já tem uma conta?
                    <a href="{{ route('second', ['auth', 'signin']) }}"
                        class="text-decoration-none text-white fw-bold">Entrar</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
