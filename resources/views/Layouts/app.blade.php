<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmaON - @yield('title', 'Farmácia Online')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f5f5;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Garante que o footer fique no final */
        }
        main {
            flex: 1; /* Faz o conteúdo principal empurrar o footer para baixo */
        }
    </style>
    @stack('styles')
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark py-3 shadow-sm" style="background-color: #0b2a4a;">
  <div class="container-fluid">

    <a class="navbar-brand fw-bold" href="{{ route('loja.home') }}">💊 FarmaON</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav gap-3 me-auto ms-4">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('loja.home') ? 'active fw-bold' : '' }}" href="{{ route('loja.home') }}">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('produtos.*') ? 'active fw-bold' : '' }}" href="{{ route('produtos.index') }}">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('carrinho') ? 'active fw-bold' : '' }}" href="{{ route('carrinho') }}">Carrinho 🛒</a>
        </li>
      </ul>

      <div class="d-flex align-items-center gap-2">
        @auth
            <span class="text-white me-3">Olá, {{ Auth::user()->name ?? 'Cliente' }}!</span>
            
            @if(Auth::user()->is_admin) <a class="btn btn-outline-light btn-sm fw-bold" href="{{ route('admin.index') }}">Painel</a>
            @endif

            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm fw-bold">Sair</button>
            </form>
        @else
            <a class="btn btn-success fw-bold px-4" href="{{ route('login') }}">Login</a>
            <a class="btn btn-outline-light fw-bold px-3" href="{{ route('cadastro') }}">Cadastrar</a>
        @endauth
      </div>
    </div>
  </div>
</nav>

<main class="py-4 container">
    @yield('content')
</main>

<footer class="bg-dark text-white text-center py-3 mt-auto">
    <div class="container">
        <small>&copy; {{ date('Y') }} FarmaON. Todos os direitos reservados.</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>