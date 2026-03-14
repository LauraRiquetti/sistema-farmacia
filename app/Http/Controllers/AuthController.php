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

            // Se o usuário logado for admin, vai para /dashboard
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/dashboard');
            }

            // Se for comum, vai para /home
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'email' => 'Usuário ou senha inválidos'
        ]);
    }
}