<!DOCTYPE html>
<html>

<head>

<title>Farmácia Online</title>

<style>

body{

margin:0;
font-family:Arial;
background:#F5F5F3;

}

/* TOPO */

.header{

background:#0D1B2A;
color:white;
padding:15px;
display:flex;
justify-content:space-between;

}

/* BANNER */

.banner{

background:url('/img/banner-farmacia.jpg');

height:300px;

display:flex;

align-items:center;

justify-content:center;

color:white;

font-size:40px;

}

/* CATEGORIAS */

.categorias{

display:flex;

justify-content:center;

gap:20px;

padding:30px;

}

.cat{

background:white;

padding:20px;

border-radius:10px;

box-shadow:0 3px 10px rgba(0,0,0,0.1);

}

/* PRODUTOS */

.produtos{

display:flex;

gap:20px;

flex-wrap:wrap;

padding:30px;

justify-content:center;

}

.card{

width:200px;

background:white;

padding:15px;

border-radius:10px;

box-shadow:0 3px 10px rgba(0,0,0,0.1);

}

.card img{

width:100%;

}

</style>

</head>

<body>

<div class="header">

<div>💊 Farmácia</div>

<div>

<a href="/login" style="color:white">Entrar</a>

<a href="/carrinho" style="color:white">Carrinho</a>

</div>

</div>

<div class="banner">

Ofertas da Semana

</div>

<div class="categorias">

<div class="cat">Farmácia</div>

<div class="cat">Beleza</div>

<div class="cat">Infantil</div>

<div class="cat">Vitaminas</div>

<div class="cat">Pet</div>

</div>

<div class="produtos">

@foreach($produtos as $produto)

<div class="card">

<img src="/storage/{{$produto->imagem}}">

<h4>{{$produto->nome}}</h4>

<p>R$ {{$produto->preco}}</p>

<form action="/carrinho/add/{{$produto->id}}" method="POST">

@csrf

<button class="btn">Comprar</button>

</form>

</div>

@endforeach

</div>

</body>

</html>
