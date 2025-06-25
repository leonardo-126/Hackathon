<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Histórico de Avaliações - {{ $aluno->nome }}</title>
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
    <h4>Aluno: {{ $aluno->nome }} (User ID: {{ $aluno->user_id }})</h4>
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
            @forelse($historico as $av)
                <tr>
                    <td>{{ $av->created_at->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $av->nota ?? '-' }}</td>
                    <td>{{ $av->relatorio ?? '-' }}</td>
                    <td>{{ $av->avaliacao ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhuma avaliação registrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html> 