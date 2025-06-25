<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Histórico de Avaliações - <?php echo e($aluno->nome); ?></title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 6px; font-size: 12px; }
        th { background: #f0f0f0; }
        h2, h4 { margin: 0; }
    </style>
</head>
<body>
    <h2>Histórico de Avaliações</h2>
    <h4>Aluno: <?php echo e($aluno->nome); ?> (User ID: <?php echo e($aluno->user_id); ?>)</h4>
    <table>
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
</body>
</html> <?php /**PATH C:\Users\leopa\Taplox-Laravel_v1.0\Taplox-Laravel\resources\views/alunos/avaliacoes_pdf.blade.php ENDPATH**/ ?>