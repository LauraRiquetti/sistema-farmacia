<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Produto; // ADICIONADO: Precisamos importar o Produto para dar baixa no estoque
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class VendaController extends Controller
{
    public function index()
    {
        $vendas = Venda::with('usuario', 'produto')->orderByDesc('id')->get();
        return view('vendas.index', compact('vendas'));
    }

    public function create()
    {
        return view('vendas.create');
    }

    // LÓGICA DE FINALIZAR COMPRA E DAR BAIXA NO ESTOQUE
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Você precisa fazer login para finalizar a compra!');
        }

        $carrinho = json_decode($request->carrinho_dados, true);

        if (!$carrinho || count($carrinho) == 0) {
            return redirect()->back()->with('error', 'Seu carrinho está vazio.');
        }

        foreach ($carrinho as $item) {
            // 1. Salva a Venda
            Venda::create([
                'usuario_id' => Auth::id(),
                'produto_id' => $item['id'],
                'valor'      => $item['valor'] * $item['quantidade'],
                'pagamento'  => 'pix', 
                'status'     => 'aguardando_confirmacao',
                'descricao'  => 'Compra via Site. Quantidade: ' . $item['quantidade'],
            ]);

            // 2. Dá baixa no Estoque do Produto
            $produto = Produto::find($item['id']);
            if ($produto) {
                // Subtrai a quantidade comprada do estoque atual
                $produto->quantidade = $produto->quantidade - $item['quantidade'];
                
                // Evita que o estoque fique negativo caso comprem mais do que tem
                if ($produto->quantidade < 0) {
                    $produto->quantidade = 0; 
                }
                
                $produto->save(); // Atualiza no banco
            }
        }

        return redirect()->route('loja.home')->with('compra_sucesso', 'Seu pedido foi realizado com sucesso!');
    }

    public function show(Venda $venda)
    {
        //
    }

    public function edit(Venda $venda)
    {
        //
    }

    public function update(Request $request, Venda $venda)
    {
        $validated = $request->validate([
            'usuario_id' => ['required', 'exists:usuarios,id'],
            'produto_id' => ['required', 'exists:produtos,id'],
            'valor' => ['required', 'numeric'],
            'pagamento' => ['required', 'in:debito,credito,pix'],
            'status' => ['required', 'in:aguardando_confirmacao,separando,saiu_para_entrega,entregue'],
            'descricao' =>['text'],
        ]);

        $venda->update([
            'usuario_id' => $validated['usuario_id'], 
            'produto_id' => $validated['produto_id'],
            'valor' => $validated['valor'],
            'pagamento' => $validated['pagamento'],
            'status' => $validated['status'],
        ]);
        
        return redirect()->route('vendas.index');
    }

    public function destroy(Venda $venda)
    {
        //
    }

    // NOVA FUNÇÃO: Tela de Meus Pedidos do Cliente
    public function meusPedidos()
    {
        // Busca as vendas onde o dono é o usuário logado atualmente e traz junto os dados do produto
        $pedidos = Venda::with('produto')
                    ->where('usuario_id', Auth::id())
                    ->orderByDesc('id')
                    ->get();

        return view('loja.meus_pedidos', compact('pedidos'));
    }
}