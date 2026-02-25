<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::orderByDesc('id')->get();

        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' =>'required|string|unique:usuarios,email',
            'senha' => 'required|string',
            'data_nascimento' => 'required|date',
            'endereco' => 'required|string',
        ]);
        Usuario::create([
            'nome' =>$request->nome,
            'email' =>$request->email,
            'senha' =>$request->senha,
            'data_nascimento' =>$request->data_nascimento,
            'endereco' =>$request->endereco,
        ]);

        return redirect()->route('usuarios.index')
            ->with('sucess', 'Usuario cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $cliente)
    {
        $validated = $request->validate([
            'nome' => ['required', 'string'],
            'email' => ['required', 'string', 'unique'],
            'senha' => ['required', 'string'],
            'data_nascimento' => ['required', 'date'],
            'endereco' => ['required', 'string'],
        ]);

        $cliente->update([
            'nome' => $validated['nome'],
            'email' =>$validated['email'],
            'senha' =>$validated['senha'],
            'data_nascimento' =>$validated['data_nascimento'],
            'endereco' =>$validated['endereco'],
        ]);

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $cliente)
    {
        $clientes->delete();
        return redirect()->route('usuarios.index');
    }
}
