<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class PasswordResetController extends Controller
{
    // 1. Mostra a tela para o usuário digitar o e-mail
    public function request()
    {
        return view('auth.forgot-password');
    }

    // 2. Recebe o e-mail, gera o token e envia a mensagem
    public function email(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', 'Enviamos um link de recuperação para o seu e-mail!');
        }

        return back()->withErrors(['email' => 'Não encontramos nenhum usuário com esse e-mail.']);
    }

    // 3. Mostra a tela com o formulário de NOVA SENHA (o link do e-mail cai aqui)
    public function reset(Request $request, $token)
    {
        // Pega o token da URL e o e-mail (se vier na URL) e manda pra view
        return view('auth.reset-password', ['token' => $token, 'email' => $request->email]);
    }

    // 4. Recebe a nova senha e salva no banco de dados
    public function update(Request $request)
    {
        // Valida se as senhas batem e se têm no mínimo 8 caracteres
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed', 
        ]);

        // Faz a troca da senha usando o broker do Laravel
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
                event(new PasswordReset($user));
            }
        );

        // Se deu tudo certo, manda pro login com mensagem de sucesso
        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Sua senha foi alterada com sucesso! Faça login.');
        }

        // Se o token expirou ou e-mail está errado, volta com erro
        return back()->withErrors(['email' => __($status)]);
    }
}