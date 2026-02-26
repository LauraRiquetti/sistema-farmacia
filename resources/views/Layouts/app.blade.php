resources/views/layouts/app.blade.php
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema Farmácia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #eef2f7;
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: #0d6efd;
            padding: 20px;
        }

        .sidebar h4 {
            color: white;
            font-weight: 600;
        }

        .sidebar a {
            display: block;
            padding: 12px;
            margin-bottom: 8px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: rgba(255,255,255,0.15);
        }

        .topbar {
            background: white;
            padding: 18px 25px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar h5 {
            margin: 0;
            font-weight: 600;
        }

        .card-custom {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .card-blue { background: #0d6efd; color: white; }
        .card-green { background: #198754; color: white; }
        .card-red { background: #dc3545; color: white; }

        .table {
            background: white;
            border-radius: 12px;
            overflow: hidden;
        }

        .btn {
            border-radius: 8px;
        }

        .btn-primary { background: #0d6efd; border: none; }
        .btn-success { background: #198754; border: none; }
        .btn-danger { background: #dc3545; border: none; }

    </style>
</head>
<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h4>💊 Farmácia</h4>
        <hr class="text-white">

        <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
        <a href="{{ route('clientes.index') }}">👤 Clientes</a>
        <a href="{{ route('estoque.index') }}">📦 Estoque</a>
        <a href="{{ route('vendas.index') }}">🧾 Vendas</a>
        <a href="{{ route('logout') }}" class="text-warning">🚪 Sair</a>
    </div>

    <!-- CONTEÚDO -->
    <div class="w-100">

        <div class="topbar">
            <h5>Sistema de Gestão Farmacêutica</h5>
            <span>Usuário: {{ auth()->user()->name ?? 'Admin' }}</span>
        </div>

        <div class="p-4">
            @yield('content')
        </div>

    </div>

</div>

</body>
</html>
