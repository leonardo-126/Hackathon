

<?php $__env->startSection('content'); ?>
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
    <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary mt-3">Voltar</a>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.vertical', ['subtitle' => 'Acessos do Aluno'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leopa\Taplox-Laravel_v1.0\Taplox-Laravel\resources\views/alunos/acessos.blade.php ENDPATH**/ ?>