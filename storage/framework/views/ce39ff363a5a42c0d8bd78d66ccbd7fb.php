

<?php $__env->startSection('content'); ?>
<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<div class="container mt-4">
    <h2>Acessos do Aluno</h2>
    <div class="card mb-4">
        <div class="card-body">
            <strong>Nome:</strong> <?php echo e($aluno->nome); ?><br>
            <strong>User ID:</strong> <?php echo e($aluno->user_id); ?><br>
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
                    <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e(\Carbon\Carbon::parse($log->ultimo_acesso)->format('d/m/Y H:i:s')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="1">Nenhum acesso registrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <form method="POST" action="<?php echo e(route('alunos.avaliarIa', $aluno->id)); ?>" class="mb-3">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-primary">Avaliar com IA</button>
    </form>
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Histórico de Avaliações</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Data/Hora</th>
                            <th>Nota</th>
                            <th>Relatório</th>
                            <th>Avaliação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $historico; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $av): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($av->created_at->format('d/m/Y H:i:s')); ?></td>
                                <td><?php echo e($av->nota ?? '-'); ?></td>
                                <td><?php echo e($av->relatorio ?? '-'); ?></td>
                                <td><?php echo e($av->avaliacao ?? '-'); ?></td>
                                <td>
                                    <div class="d-grid gap-2 d-md-block">
                                        <a href="<?php echo e(route('avaliacao.pdf', $av->id)); ?>" class="btn btn-sm btn-danger">Exportar PDF</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5">Nenhuma avaliação registrada.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary mt-3 mb-3">Voltar</a>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.vertical', ['subtitle' => 'Acessos do Aluno'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\leopa\Taplox-Laravel_v1.0\Taplox-Laravel\resources\views/alunos/acessos.blade.php ENDPATH**/ ?>