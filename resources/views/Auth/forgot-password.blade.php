<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Esqueci Minha Senha - FarmaOn</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f3f4f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 100%; max-width: 400px; text-align: center; }
        input[type="email"] { width: 90%; padding: 10px; margin: 15px 0; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #1e3a8a; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px; }
        button:hover { background-color: #1e40af; }
        .msg-sucesso { color: #15803d; background: #dcfce7; padding: 10px; border-radius: 4px; margin-bottom: 15px; }
        .msg-erro { color: #b91c1c; background: #fee2e2; padding: 10px; border-radius: 4px; margin-bottom: 15px; }
    </style>
</head>
<body>

    <div class="card">
        <h2>Recuperar Senha</h2>
        <p>Digite seu e-mail abaixo. Enviaremos um link para você criar uma nova senha.</p>

        @if (session('status'))
            <div class="msg-sucesso">{{ session('status') }}</div>
        @endif
        @error('email')
            <div class="msg-erro">{{ $message }}</div>
        @enderror

        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Seu e-mail cadastrado" required autofocus>
            <button type="submit">Enviar Link de Recuperação</button>
        </form>
        
        <br>
        <a href="{{ route('login') }}" style="color: #666; font-size: 14px; text-decoration: none;">Voltar para o Login</a>
    </div>

</body>
</html>