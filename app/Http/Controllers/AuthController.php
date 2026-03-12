<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Método para mostrar o formulário (GET)
    public function showLoginForm()
    {
        return view('auth.login'); // ou o nome da sua view de login
    }

    // Método para PROCESSAR o login (POST) - O QUE ESTÁ FALTANDO
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect('/dashboard');
            } else {
                return redirect('/home');
            }

        }

        return back()->withErrors([
            'email' => 'Usuário ou senha inválidos'
        ]);
    }
}