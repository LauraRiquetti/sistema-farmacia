<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmácia Online</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            margin:0;
            font-family:Arial, Helvetica, sans-serif;
            background:#f5f5f5;
        }

        header{
            background:#0b2a4a;
            color:white;
            padding:15px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .logo{
            font-size:22px;
            font-weight:bold;
        }

        .menu a{
            color:white;
            margin-left:15px;
            text-decoration:none;
            font-size:14px;
        }

        .busca{
            padding:15px;
        }

        .busca input{
            width:100%;
            padding:10px;
            border-radius:20px;
            border:1px solid #ccc;
        }

        .container{
            padding:15px;
        }

        .carrossel img{
            width:100%;
            border-radius:10px;
        }

        .titulo{
            font-size:20px;
            color:#0b2a4a;
            margin-top:20px;
        }

        .produtos{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:15px;
            margin-top:10px;
        }

        .produto{
            background:white;
            border-radius:10px;
            padding:10px;
            position:relative;
            text-align:center;
        }

        .produto img{
            width:100%;
            height:120px;
            object-fit:contain;
        }

        .desconto{
            position:absolute;
            top:5px;
            left:5px;
            background:#e30613;
            color:white;
            font-size:12px;
            padding:4px 6px;
            border-radius:5px;
        }

        .preco-antigo{
            text-decoration:line-through;
            font-size:12px;
            color:#999;
        }

        .preco{
            color:#0b2a4a;
            font-weight:bold;
            font-size:18px;
        }

        .botao{
            background:#e30613;
            color:white;
            border:none;
            padding:8px;
            width:100%;
            border-radius:5px;
            margin-top:8px;
            cursor:pointer;
        }

        footer{
            position:fixed;
            bottom:0;
            width:100%;
            background:white;
            border-top:1px solid #ddd;
            display:flex;
            justify-content:space-around;
            padding:10px;
        }

        footer div{
            text-align:center;
            font-size:12px;
        }

        .form-box{
            max-width:400px;
            margin:auto;
            background:white;
            padding:25px;
            border-radius:10px;
        }

        input{
            width:100%;
            padding:10px;
            margin-top:10px;
            border-radius:6px;
            border:1px solid #ccc;
        }

        table{
            width:100%;
            background:white;
            border-radius:10px;
        }

        th,td{
            padding:12px;
            border-bottom:1px solid #eee;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4 shadow-sm">
  <div class="container-fluid">

    <a class="navbar-brand fw-bold" href="{{ route('loja.home') }}">💊 FarmaON</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav gap-3 me-auto ms-4">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('loja.home') }}">Início</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('produtos.index') }}">Produtos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('carrinho') }}">Carrinho</a>
        </li>
      </ul>

      <div class="d-flex align-items-center">
        <a class="btn btn-success fw-bold px-4" href="{{ route('login') }}">Login</a>
      </div>

    </div>
  </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>