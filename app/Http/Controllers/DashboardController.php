<?php

namespace App\Http\Controllers;

use App\Models\User; // Ajuste para App\Models\Usuario se esse for o seu model
use App\Models\Produto;
use App\Models\Venda;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Contagens Básicas
        $totalUsuarios = User::count(); // Use Usuario::count() se for o caso
        $totalProdutos = Produto::count();
        $totalVendas   = class_exists('\App\Models\Venda') ? Venda::count() : 0;

        // 2. Faturamento Total (Soma do valor de todas as vendas que não foram canceladas)
        $faturamentoTotal = 0;
        if (class_exists('\App\Models\Venda')) {
            $faturamentoTotal = Venda::where('status', '!=', 'cancelado')->sum('valor');
        }

        // 3. Alerta de Estoque Baixo (Produtos com 5 ou menos unidades)
        $estoqueBaixo = Produto::where('quantidade', '<=', 5)->get();

        // 4. Últimos 5 Pedidos para a tabela rápida
        $ultimosPedidos = class_exists('\App\Models\Venda') 
                            ? Venda::with('usuario', 'produto')->orderByDesc('created_at')->take(5)->get() 
                            : collect();

        // 5. Dados para o Gráfico (Exemplo simplificado: Vendas por status)
        $vendasAguardando = class_exists('\App\Models\Venda') ? Venda::where('status', 'aguardando_confirmacao')->count() : 0;
        $vendasSeparando  = class_exists('\App\Models\Venda') ? Venda::where('status', 'separando')->count() : 0;
        $vendasEmRota     = class_exists('\App\Models\Venda') ? Venda::where('status', 'saiu_para_entrega')->count() : 0;
        $vendasEntregues  = class_exists('\App\Models\Venda') ? Venda::where('status', 'entregue')->count() : 0;

        $dadosGrafico = [
            'aguardando' => $vendasAguardando,
            'separando'  => $vendasSeparando,
            'em_rota'    => $vendasEmRota,
            'entregue'   => $vendasEntregues,
        ];

        return view('admin.dashboard', compact(
            'totalUsuarios', 
            'totalProdutos', 
            'totalVendas', 
            'faturamentoTotal', 
            'estoqueBaixo', 
            'ultimosPedidos',
            'dadosGrafico'
        ));
    }

    public function relatorio()
    {
        // Busca todas as vendas para o relatório (em um sistema real, poderíamos filtrar por data)
        $vendas = class_exists('\App\Models\Venda') 
                    ? Venda::with('usuario', 'produto')->orderByDesc('created_at')->get() 
                    : collect();

        // Calcula o faturamento apenas das vendas que não foram canceladas
        $faturamentoTotal = class_exists('\App\Models\Venda') 
                    ? Venda::where('status', '!=', 'cancelado')->sum('valor') 
                    : 0;

        return view('admin.relatorio', compact('vendas', 'faturamentoTotal'));
    }
}