<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Avaliação - <?php echo e($aluno->nome); ?></title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .box { border: 1px solid #333; border-radius: 4px; padding: 10px; margin-bottom: 10px; background: #f9f9f9; }
        h2, h4 { margin: 0; }
    </style>
</head>
<body>
    <h2>Avaliação Individual</h2>
    <h4>Aluno: <?php echo e($aluno->nome); ?> (User ID: <?php echo e($aluno->user_id); ?>)</h4>
    <div class="box">
        <strong>Data/Hora:</strong> <?php echo e($avaliacao->created_at->format('d/m/Y H:i:s')); ?><br>
        <strong>Nota:</strong> <?php echo e($avaliacao->nota ?? '-'); ?><br>
        <strong>Relatório:</strong><br>
        <div><?php echo e($avaliacao->relatorio ?? '-'); ?></div>
        <strong>Avaliação:</strong><br>
        <div><?php echo e($avaliacao->avaliacao ?? '-'); ?></div>
    </div>
</body>
</html> <?php /**PATH C:\Users\leopa\Taplox-Laravel_v1.0\Taplox-Laravel\resources\views/alunos/avaliacao_pdf.blade.php ENDPATH**/ ?>