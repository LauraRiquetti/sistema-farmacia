<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{

    public function buscarCep($cep)
    {
        $response = Http::get("https://viacep.com.br/ws/$cep/json/");

        $dados = $response->json();

        return response()->json($dados);
    }
    public function index()
    {
        $usuarios = Usuario::orderByDesc('id')->get();

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

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
        return redirect('/login');
        return redirect()->route('usuarios.index')
            ->with('sucess', 'Usuario cadastrado com sucesso!');
    }

    public function show(Usuario $cliente)
    {
        //
    }

    public function edit(Usuario $cliente)
    {
        //
    }

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

    public function destroy(Usuario $cliente)
    {
        $cliente->delete();
        return redirect()->route('usuarios.index');
    }
}
