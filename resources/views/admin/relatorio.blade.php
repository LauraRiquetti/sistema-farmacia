<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Vendas - FarmaOn</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; color: #333; }
        .cabecalho { text-align: center; margin-bottom: 40px; padding-bottom: 20px; border-bottom: 2px solid #ccc; }
        .cabecalho h1 { margin: 0; color: #1e3a8a; }
        .cabecalho p { margin: 5px 0; color: #666; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; font-size: 14px; }
        th { background-color: #f8f9fa; font-weight: bold; }
        .total { text-align: right; margin-top: 30px; font-size: 20px; font-weight: bold; }
        .btn-imprimir { 
            display: block; width: 200px; margin: 0 auto 30px auto; padding: 10px; 
            background-color: #1e3a8a; color: white; text-align: center; 
            text-decoration: none; border-radius: 5px; cursor: pointer; border: none; font-size: 16px;
        }
        /* Esconde o botão na hora de imprimir o papel/PDF */
        @media print {
            .btn-imprimir { display: none; }
        }
    </style>
</head>
<body>

    <button class="btn-imprimir" onclick="window.print()">🖨️ Imprimir / Salvar PDF</button>

    <div class="cabecalho">
        <h1>FarmaOn - Relatório de Vendas</h1>
        <p>Gerado em: {{ date('d/m/Y \à\s H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Cód. Pedido</th>
                <th>Data</th>
                <th>Cliente</th>
                <th>Produto</th>
                <th>Status</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendas as $venda)
                <tr>
                    <td>#{{ str_pad($venda->id, 5, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $venda->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $venda->usuario->name ?? 'Cliente Removido' }}</td>
                    <td>{{ $venda->produto->nome ?? 'Produto Removido' }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $venda->status)) }}</td>
                    <td>R$ {{ number_format($venda->valor, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        Faturamento Total Válido: R$ {{ number_format($faturamentoTotal, 2, ',', '.') }}
    </div>

</body>
</html>