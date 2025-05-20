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
                                    <img src="/images/logo-dark.png" height="60" alt="logo dark">
                                </a>

                                <a href="<?php echo e(route('any', 'index')); ?>" class="logo-light">
                                    <img src="/images/logo-light.png" height="60" alt="logo light">
                                </a>
                            </div>
                            <h4 class="fw-bold text-dark mb-2">Bem-vindo de volta!</h4>
                            <p class="text-muted">Faça login na sua conta para continuar</p>
                        </div>
                        <form method="POST" action="<?php echo e(route('login')); ?>" class="mt-4">

                            <?php echo csrf_field(); ?>

                            <div class="mb-3">
                                <label for="email" class="form-label">Endereço de e-mail</label>
                                <input type="email" class="form-control" id="email" name="email" value="user@demo.com"
                                    placeholder="Digite seu e-mail">
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="password" class="form-label">Senha</label>
                                    <a href="<?php echo e(route('second', ['auth', 'password'])); ?>"
                                        class="text-decoration-none small text-muted">Esqueceu a senha?</a>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" value="password"
                                    placeholder="Digite sua senha">
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="remember-me">
                                <label class="form-check-label" for="remember-me">Lembrar de mim</label>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-dark btn-lg fw-medium" type="submit">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <p class="text-center mt-4 text-white text-opacity-50">Não tem uma conta?
                    <a href="<?php echo e(route('second', ['auth', 'signup'])); ?>"
                        class="text-decoration-none text-white fw-bold">Cadastre-se</a>
                </p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', ['subtitle' => 'Entrar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\leopa\Taplox-Laravel_v1.0\Taplox-Laravel\resources\views/auth/signin.blade.php ENDPATH**/ ?>