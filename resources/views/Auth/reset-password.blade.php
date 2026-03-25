<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Nova Senha - FarmaOn</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f3f4f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 100%; max-width: 400px; text-align: center; }
        input { width: 90%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #1e3a8a; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px; margin-top: 10px;}
        button:hover { background-color: #1e40af; }
        .msg-erro { color: #b91c1c; background: #fee2e2; padding: 10px; border-radius: 4px; margin-bottom: 15px; text-align: left;}
    </style>
</head>
<body>

    <div class="card">
        <h2>Criar Nova Senha</h2>
        
        @if ($errors->any())
            <div class="msg-erro">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            
            <input type="hidden" name="token" value="{{ $token }}">

            <input type="email" name="email" value="{{ $email ?? old('email') }}" placeholder="Seu e-mail" required readonly>
            
            <input type="password" name="password" placeholder="Nova Senha (mín. 8 caracteres)" required autofocus>
            <input type="password" name="password_confirmation" placeholder="Confirme a Nova Senha" required>
            
            <button type="submit">Salvar Nova Senha</button>
        </form>
    </div>

</body>
</html> 