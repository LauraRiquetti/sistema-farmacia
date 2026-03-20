<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    // Função 1: Apenas adiciona e dispara o Pop-up de sucesso na Home
    public function adicionar($id)
    {
        $produto = Produto::findOrFail($id);

        $carrinho = session()->get('carrinho', []);

        if(isset($carrinho[$id]))
        {
            $carrinho[$id]['quantidade']++;
        } else {
            $carrinho[$id] = [
                "nome"=> $produto->nome,
                "valor"=> $produto->valor,
                "quantidade"=> 1
            ];
        }
        
        session()->put('carrinho', $carrinho);

        // A mensagem de sucesso vem AQUI!
        return redirect()->back()->with('sucesso', 'Produto adicionado ao carrinho com sucesso!');
    }

    // Função 2: Apenas abre a aba do carrinho em paz, sem avisos
    public function index()
    {
        $carrinho = session()->get('carrinho', []);

        // Retorna a view (a tela) do carrinho passando os produtos
        return view('loja.carrinho', compact('carrinho'));
    }

    // ... (suas funções adicionar e index continuam aqui)

    // NOVA FUNÇÃO: Limpa o carrinho
    public function limpar()
    {
        // Remove o carrinho da sessão do navegador
        session()->forget('carrinho');
        
        // Volta para a página do carrinho (que agora estará vazia)
        return redirect()->back();
    }
}