@extends('layouts.app')

@section('content')

<div class="busca">

    <input
        type="text"
        placeholder="Buscar medicamentos..."
    >

</div>

<div class="container">

<div class="carrossel">

<img src="https://img.freepik.com/free-vector/online-pharmacy-banner_107791-1191.jpg">

</div>


<h2 class="titulo">

Ofertas da semana

</h2>


<div class="produtos">

@foreach($produtos as $produto)

<div class="produto">

<div class="desconto">

-20%

</div>

<img src="{{ $produto->imagem }}">

<h4>

{{ $produto->nome }}

</h4>

<div class="preco-antigo">

R$ {{ $produto->preco_antigo }}

</div>

<div class="preco">

R$ {{ $produto->preco }}

</div>

<button class="botao">

Adicionar ao carrinho

</button>

</div>

@endforeach

</div>

</div>

@endsection
