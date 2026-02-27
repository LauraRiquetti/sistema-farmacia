<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::orderByDesc('id')->get();

        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validated([
            'nome' => 'required|string',
            'quantidade' => 'required|integer',
            'valor' => 'required|decimal',
            'status' => 'required|enum',
            'descricao' => 'nullable|text',
        ]);

        Produto::create([
            'nome' =>$request->nome,
            'quantidade' =>$request->quantidade,
            'valor' =>$request->valor,
            'status' => $request->status,
            'descricao' =>$nullable->descricao,
        ]);

        return redirect()->route('produtos.index')
            ->with('sucess', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $validated = $request->validate([
            'nome' => ['required', 'string'],
            'quantidade' => ['required', 'integer'],
            'valor' => ['required', 'decimal'],
            'status' => ['disponivel', 'esgotado', 'reservado'],
            'descricao' => ['text'],
        ]);

        $produtos->update([
            'nome' =>validated['nome'],
            'quantidade' =>validated['quantidade'],
            'valor' =>validated['valor'],
            'status' =>validated['status'],
            'descricao' =>validated['descricao'],
        ]);
        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produtos->delete();
        return redirect()->route(produtos.index);
    }
}
