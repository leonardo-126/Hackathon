<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.partials.page-title', ['title' => 'Taplox', 'subtitle' => 'Painel'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="row">
    <!-- Cartão 3 -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-md bg-primary bg-opacity-10 rounded-circle">
                            <iconify-icon icon="solar:calendar-date-outline"
                                class="fs-32 text-primary avatar-title"></iconify-icon>
                        </div>
                    </div>
                    <div class="col-6 text-end">
                        <p class="text-muted mb-0 text-truncate">Eventos</p>
                        <h3 class="text-dark mt-2 mb-0">5.123</h3>
                    </div>
                </div>
            </div>
            <div class="card-footer border-0 py-2 bg-light bg-opacity-50 mx-2 mb-2">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-success"><i class="bx bxs-up-arrow fs-12"></i> 4,78%</span>
                        <span class="text-muted ms-1 fs-12">Desde o mês passado</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cartão 4 -->
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
                        <p class="text-muted mb-0 text-truncate">Alunos Risco</p>
                        <h3 class="text-dark mt-2 mb-0"><?php echo e(number_format($usuariosEmRisco, 0, ',', '.')); ?></h3>
                    </div>
                </div>
            </div>
            <div class="card-footer border-0 py-2 bg-light bg-opacity-50 mx-2 mb-2">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-success"><i class="bx bxs-up-arrow fs-12"></i> 2,35%</span>
                        <span class="text-muted ms-1 fs-12">Desde o mês passado</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="table-responsive table-centered">
                <table class="table mb-0">
                    <thead class="bg-light bg-opacity-50">
                        <tr>
                            <th class="border-0 py-2">Data</th>
                            <th class="border-0 py-2">Usuário</th>
                            <th class="border-0 py-2">Conta</th>
                            <th class="border-0 py-2">Nome de usuário</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>24 Abril, 2024</td>
                            <td><img src="/images/users/avatar-2.jpg" alt="avatar-2"
                                    class="img-fluid avatar-xs rounded-circle"> <span
                                    class="align-middle ms-1">Dan Adrick</span></td>
                            <td><span class="badge badge-soft-success">risco</span></td>
                            <td>@omions</td>
                        </tr>
                        <tr>
                            <td>24 Abril, 2024</td>
                            <td><img src="/images/users/avatar-3.jpg" alt="avatar-3"
                                    class="img-fluid avatar-xs rounded-circle"> <span
                                    class="align-middle ms-1">Daniel Olsen</span></td>
                            <td><span class="badge badge-soft-success">risco</span></td>
                            <td>@alliates</td>
                        </tr>
                        <tr>
                            <td>20 Abril, 2024</td>
                            <td><img src="/images/users/avatar-4.jpg" alt="avatar-4"
                                    class="img-fluid avatar-xs rounded-circle"> <span
                                    class="align-middle ms-1">Jack Roldan</span></td>
                            <td><span class="badge badge-soft-warning">risco</span></td>
                            <td>@griys</td>
                        </tr>
                        <tr>
                            <td>18 Abril, 2024</td>
                            <td><img src="/images/users/avatar-5.jpg" alt="avatar-5"
                                    class="img-fluid avatar-xs rounded-circle"> <span
                                    class="align-middle ms-1">Betty Cox</span></td>
                            <td><span class="badge badge-soft-success">baixo risco</span></td>
                            <td>@reffon</td>
                        </tr>
                        <tr>
                            <td>18 Abril, 2024</td>
                            <td><img src="/images/users/avatar-6.jpg" alt="avatar-6"
                                    class="img-fluid avatar-xs rounded-circle"> <span
                                    class="align-middle ms-1">Carlos Johnson</span></td>
                            <td><span class="badge badge-soft-danger">baixo risco</span></td>
                            <td>@bebo</td>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- fim da tabela responsiva -->

            <div class="align-items-center justify-content-between row g-0 text-center text-sm-start p-3 border-top">
                <div class="col-sm">
                    <div class="text-muted">
                        Mostrando <span class="fw-semibold">5</span> de <span class="fw-semibold">587</span> usuários
                    </div>
                </div>
                <div class="col-sm-auto mt-3 mt-sm-0">
                    <ul class="pagination pagination-rounded m-0">
                        <li class="page-item">
                            <a href="#" class="page-link"><i class='bx bx-left-arrow-alt'></i></a>
                        </li>
                        <li class="page-item active">
                            <a href="#" class="page-link">1</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">3</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link"><i class='bx bx-right-arrow-alt'></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> <!-- fim do card -->
    </div> <!-- fim da coluna -->
</div> <!-- fim da linha -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo app('Illuminate\Foundation\Vite')(['resources/js/pages/dashboard.js']); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.vertical', ['subtitle' => 'Painel'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leopa\Taplox-Laravel_v1.0\Taplox-Laravel\resources\views/index.blade.php ENDPATH**/ ?>