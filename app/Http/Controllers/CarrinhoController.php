<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function adicionar($id)
    {
        $produto = Produto::findOrFail($id);

        $carrinho = session()->get('carrinho', []);

        if(isset($carrinho[$id]))
        {
            $carrinho[$id]['quantidade']++;
        } else{
            $carrinho[$id] = [
                "nome"=> $produto->nome,
                "valor"=> $produto->valor,
                "quantidade"=> 1
            ];
        }
        session()->put('carrinho', $carrinho);

        return redirect()->back();
    }
    public function index()
    {
        $carrinho = session()->get('carrinho', []);

        return view('carrinho', compact('carrinho'));
    }
}
