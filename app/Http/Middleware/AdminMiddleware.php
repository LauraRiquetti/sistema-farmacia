<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Verifica se o usuário está logado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // 2. MODO DEBUG (Descomente a linha abaixo se o erro 403 persistir)
        // dd('Seu cargo atual no banco é:', $user->role);

        // 3. Verificação flexível (ignora maiúsculas/minúsculas e espaços)
        if ($user->role && strtolower(trim($user->role)) === 'admin') {
            return $next($request);
        }

        // 4. Se não for admin, nega o acesso com mensagem detalhada
        abort(403, 'Acesso negado. Seu cargo atual é: ' . ($user->role ?? 'Nulo'));
    }
}