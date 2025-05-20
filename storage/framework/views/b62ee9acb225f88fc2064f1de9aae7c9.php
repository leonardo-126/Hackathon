<?php $__env->startSection('body-attribuet'); ?>
class="authentication-bg"
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="account-pages py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <div class="text-center">
                            <div class="mx-auto mb-4 text-center auth-logo">
                                <a href="<?php echo e(route('any', 'index')); ?>" class="logo-dark">
                                    <img src="/images/logo-dark.png" height="60" alt="logo escuro">
                                </a>

                                <a href="<?php echo e(route('any', 'index')); ?>" class="logo-light">
                                    <img src="/images/logo-light.png" height="60" alt="logo claro">
                                </a>
                            </div>
                            <h4 class="fw-bold text-dark mb-2">Olá!</h4>
                            <p class="text-muted">Digite sua senha para acessar o painel de administração.</p>
                        </div>

                        <form action="<?php echo e(route('any', 'index')); ?>" class="mt-4">
                            <div class="mb-3">
                                <label class="form-label" for="example-password">Senha</label>
                                <input type="text" id="example-password" class="form-control"
                                    placeholder="Digite sua senha">
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                    <label class="form-check-label" for="checkbox-signin">Aceito os Termos e Condições</label>
                                </div>
                            </div>

                            <div class="mb-1 text-center d-grid">
                                <button class="btn btn-dark btn-lg fw-medium" type="submit">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <p class="text-center mt-4 text-white text-opacity-50">Não é você? Voltar para
                    <a href="<?php echo e(route('second', ['auth', 'signup'])); ?>"
                        class="text-decoration-none text-white fw-bold">Cadastrar</a>
                </p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', ['subtitle' => 'Tela de Bloqueio'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\leopa\Taplox-Laravel_v1.0\Taplox-Laravel\resources\views/auth/lock-screen.blade.php ENDPATH**/ ?>