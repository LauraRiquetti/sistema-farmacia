<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'CEP' => 'required|integer',
            'rua' => 'required|string',
            'bairro' => 'required|string',
            'cidade' => 'required|string',
            'estado' => 'required|string',
            'numero' => 'required|integer',
        ]);
        Usuario::create([
            'nome' =>$request->nome,
            'email' =>$request->email,
            'senha' =>Hash::make($request->senha),
            'data_nascimento' =>$request->data_nascimento,
            'CEP' =>$request->CEP,
            'rua' =>$request->rua,
            'bairro' =>$request->bairro,
            'cidade' =>$request->cidade,
            'estado' =>$request->estado,
            'numero' =>$request->numero,
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
            'CEP' => ['required', 'integer'],
            'rua' => ['required', 'string'],
            'bairro' => ['required', 'string'],
            'cidade' => ['required', 'string'],
            'estado' => ['required', 'string'],
            'numero' => ['required', 'integer'],
        ]);

        $usuario->update([
            'nome' => $validated['nome'],
            'email' =>$validated['email'],
            'senha' =>$validated['senha'],
            'data_nascimento' =>$validated['data_nascimento'],
            'CEP' =>$validated['CEP'],
            'rua' =>$validated['rua'],
            'bairro' =>$validated['bairro'],
            'cidade' =>$validated['cidade'],
            'estado' =>$validated['estado'],
            'numero' =>$validated['numeor'],
        ]);

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $cliente)
    {
        $cliente->delete();
        return redirect()->route('usuarios.index');
    }
}
