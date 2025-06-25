

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>Resultado da Avaliação IA</h2>
    <div class="card mb-4">
        <div class="card-body">
            <strong>Nome:</strong> <?php echo e($aluno->nome); ?><br>
            <strong>User ID:</strong> <?php echo e($aluno->user_id); ?><br>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Avaliação Atual</h5>
        </div>
        <div class="card-body">
            <?php if(is_array($resultado) && isset($resultado[0])): ?>
                <strong>Nome:</strong> <?php echo e($resultado[0]['nome'] ?? '-'); ?><br>
                <strong>Nota:</strong> <?php echo e($resultado[0]['nota'] ?? '-'); ?><br>
                <strong>Relatório:</strong><br>
                <div class="border rounded p-2 mb-2 bg-light"><?php echo e($resultado[0]['relatorio'] ?? '-'); ?></div>
                <strong>Avaliação:</strong><br>
                <div class="border rounded p-2 bg-light"><?php echo e($resultado[0]['avaliacao'] ?? '-'); ?></div>
            <?php else: ?>
                <span class="text-danger">Não foi possível obter a avaliação.</span>
            <?php endif; ?>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Histórico de Avaliações</h5>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Data/Hora</th>
                        <th>Nota</th>
                        <th>Relatório</th>
                        <th>Avaliação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $historico; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $av): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($av->created_at->format('d/m/Y H:i:s')); ?></td>
                            <td><?php echo e($av->nota ?? '-'); ?></td>
                            <td><?php echo e($av->relatorio ?? '-'); ?></td>
                            <td><?php echo e($av->avaliacao ?? '-'); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4">Nenhuma avaliação registrada.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <a href="<?php echo e(route('alunos.acessos', $aluno->id)); ?>" class="btn btn-secondary mt-3">Voltar</a>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.vertical', ['subtitle' => 'Resultado da Avaliação IA'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leopa\Taplox-Laravel_v1.0\Taplox-Laravel\resources\views/alunos/resultado_ia.blade.php ENDPATH**/ ?>