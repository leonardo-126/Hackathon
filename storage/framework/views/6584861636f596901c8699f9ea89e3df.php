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
                            <h4 class="fw-bold text-dark mb-2">Redefinir Senha</h4>
                            <p class="text-muted">Informe seu endereço de e-mail e enviaremos instruções para redefinir sua senha.</p>
                        </div>
                        <form action="<?php echo e(route('any', 'index')); ?>" class="mt-4">
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
                    <a href="<?php echo e(route('second', ['auth', 'signup'])); ?>"
                        class="text-decoration-none text-white fw-bold">Entrar</a>
                </p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', ['subtitle' => 'Redefinir Senha'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\leopa\Taplox-Laravel_v1.0\Taplox-Laravel\resources\views/auth/password.blade.php ENDPATH**/ ?>