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
            'valor' => ['required', 'numeric'],
        ]);

        $produtos->update([
            'nome' =>$validated['nome'],
            'quantidade' =>$validated['quantidade'],
            'valor' =>$validated['valor'],
        ]);
        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index');
    }
}
