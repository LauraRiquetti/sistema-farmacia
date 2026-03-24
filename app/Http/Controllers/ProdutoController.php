<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::orderByDesc('id')->get();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $produto = new Produto();
        $request->validate([
            'nome' => 'required|string',
            'quantidade' => 'required|integer',
            'valor' => 'required|numeric',
        ]);

        Produto::create([
            'nome' =>$request->nome,
            'quantidade' =>$request->quantidade,
            'valor' =>$request->valor,
        ]);
        return redirect()->route('produtos.index')
            ->with('sucess', 'Produto cadastrado com sucesso!');
    }

    public function show(Produto $produto)
    {
        //
    }

    public function edit(Produto $produto)
    {
        
    }

    public function update(Request $request, Produto $produto)
    {
        $validated = $request->validate([
            'nome' => ['required', 'string'],
            'quantidade' => ['required', 'integer'],
            'valor' => ['required', 'numeric'],
        ]);

        $produto->update([
            'nome' =>$validated['nome'],
            'quantidade' =>$validated['quantidade'],
            'valor' =>$validated['valor'],
        ]);
        return redirect()->route('produtos.index');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index');
    }
    
    // NOVA FUNÇÃO: Exibe produtos por Departamento/Categoria
    public function porCategoria($categoria)
    {
        // Busca os produtos onde a coluna 'categoria' bate com a URL
        $produtos = Produto::where('categoria', $categoria)->get();
        
        // Vamos usar a mesma view (loja.home), mas agora passando apenas os produtos filtrados e o nome da categoria atual
        return view('loja.home', compact('produtos', 'categoria'));
    }
}