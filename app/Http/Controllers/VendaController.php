<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendas = Venda::with('usuario', 'produto')->orderByDesc('id')->get();
        return view('vendas.index', compact('vendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validated([
            'usuario_id' => 'required|exists:usuarios,id',
            'produto_id' => 'required|exists:produtos,id',
            'valor' => 'required|decimal',
            'pagamento' => 'required|enum',
            'status' => 'required|enum',
            'descricao' => 'nullable|text',
        ]);

        Venda::create([
            'usuario_id' => $request->usuario_id,
            'produto_id' =>$request->produto_id,
            'valor' => $request->valor,
            'pagamento' => $request->pagamento,
            'status' => $request->status,
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('vendas.index')
            ->with('sucess', 'Venda cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venda $venda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venda $venda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
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

        ]);
    }

    /*public function update(Request $request, Venda $venda)
    {
    $validated = $request->validate([
        'cliente_id' => ['required', 'exists:clientes,id'],
        'produto_id' => ['required', 'exists:produtos,id'],
        'valor' => ['required', 'numeric'],
        'pagamento' => ['required', 'in:debito,credito,pix'],
        'status' => ['required', 'in:aguardando_confirmacao,separando,saiu_para_entrega,entregue'],
    ]);

    $venda->update([
        'cliente_id' => $validated['cliente_id'],
        'produto_id' => $validated['produto_id'],
        'valor' => $validated['valor'],
        'pagamento' => $validated['pagamento'],
        'status' => $validated['status'],
    ]);

    return redirect()->route('vendas.index');
    }*/
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venda $venda)
    {
        //
    }
}
