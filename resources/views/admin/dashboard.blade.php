@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 30px; margin-bottom: 50px;">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h2 style="color: #ff0000; ...">📊 Painel Administrativo</h2>
        
        <a href="{{ route('admin.relatorio') }}" target="_blank" 
           style="background-color: #10b981; color: white; padding: 10px 20px; text-decoration: none; border-radius: 6px; font-weight: bold; box-shadow: 0 4px 6px rgba(16, 185, 129, 0.3); transition: 0.3s;"
           onmouseover="this.style.backgroundColor='#059669'"
           onmouseout="this.style.backgroundColor='#10b981'">
            📄 Gerar Relatório de Vendas
        </a>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px;">
        
        <div style="background: linear-gradient(135deg, #1e3a8a, #3b82f6); color: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            <h5 style="margin-bottom: 10px; opacity: 0.9; font-size: 1rem;">Faturamento Total</h5>
            <h2 style="margin: 0; font-weight: bold;">R$ {{ number_format($faturamentoTotal, 2, ',', '.') }}</h2>
        </div>

        <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border-left: 5px solid #10b981;">
            <h5 style="color: #6b7280; margin-bottom: 10px; font-size: 1rem;">Pedidos Realizados</h5>
            <h2 style="margin: 0; color: #1f2937; font-weight: bold;">{{ $totalVendas }}</h2>
        </div>

        <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border-left: 5px solid #f59e0b;">
            <h5 style="color: #6b7280; margin-bottom: 10px; font-size: 1rem;">Produtos Cadastrados</h5>
            <h2 style="margin: 0; color: #1f2937; font-weight: bold;">{{ $totalProdutos }}</h2>
        </div>

        <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border-left: 5px solid #8b5cf6;">
            <h5 style="color: #6b7280; margin-bottom: 10px; font-size: 1rem;">Clientes Registrados</h5>
            <h2 style="margin: 0; color: #1f2937; font-weight: bold;">{{ $totalUsuarios }}</h2>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
        
        <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
            <h4 style="color: #1f2937; font-weight: bold; margin-bottom: 20px;">Últimos Pedidos</h4>
            @if($ultimosPedidos->isEmpty())
                <p style="color: #6b7280;">Nenhum pedido realizado ainda.</p>
            @else
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid #e5e7eb; color: #6b7280; text-align: left;">
                            <th style="padding: 10px;">ID</th>
                            <th style="padding: 10px;">Produto</th>
                            <th style="padding: 10px;">Valor</th>
                            <th style="padding: 10px;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ultimosPedidos as $pedido)
                            <tr style="border-bottom: 1px solid #e5e7eb;">
                                <td style="padding: 12px; font-weight: bold; color: #4b5563;">#{{ $pedido->id }}</td>
                                <td style="padding: 12px;">{{ $pedido->produto->nome ?? 'Produto Excluído' }}</td>
                                <td style="padding: 12px; color: #10b981; font-weight: bold;">R$ {{ number_format($pedido->valor, 2, ',', '.') }}</td>
                                <td style="padding: 12px;">
                                    <span style="font-size: 0.85rem; padding: 4px 8px; border-radius: 4px; background-color: #f3f4f6; color: #374151;">
                                        {{ ucfirst(str_replace('_', ' ', $pedido->status)) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <div style="display: flex; flex-direction: column; gap: 20px;">
            
            <div style="background: #fef2f2; border: 1px solid #fca5a5; padding: 20px; border-radius: 12px;">
                <h4 style="color: #b91c1c; font-weight: bold; margin-bottom: 15px;">⚠️ Alerta de Estoque</h4>
                @if($estoqueBaixo->isEmpty())
                    <p style="color: #047857; font-weight: bold;">Todos os produtos com estoque OK!</p>
                @else
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        @foreach($estoqueBaixo as $produto)
                            <li style="margin-bottom: 8px; color: #991b1b; display: flex; justify-content: space-between;">
                                <span>{{ $produto->nome }}</span>
                                <span style="font-weight: bold; background: #fee2e2; padding: 2px 6px; border-radius: 4px;">{{ $produto->quantidade }} unid.</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
                <h4 style="color: #1f2937; font-weight: bold; margin-bottom: 15px;">Status das Vendas</h4>
                <canvas id="graficoVendas"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('graficoVendas');
    new Chart(ctx, {
        type: 'doughnut', 
        data: {
            labels: ['Aguardando', 'Separando', 'Em Rota', 'Entregue'],
            datasets: [{
                data: [
                    {{ $dadosGrafico['aguardando'] }},
                    {{ $dadosGrafico['separando'] }},
                    {{ $dadosGrafico['em_rota'] }},
                    {{ $dadosGrafico['entregue'] }}
                ],
                backgroundColor: ['#f59e0b', '#3b82f6', '#10b981', '#6b7280'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
</script>
@endsection