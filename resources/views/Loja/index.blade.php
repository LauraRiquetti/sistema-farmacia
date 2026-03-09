@extends('layouts.app')

@section('content')

<h2 style="padding:20px">Produtos</h2>

<div class="grid">

@foreach($produtos as $produto)

<div class="card">

<img src="{{ asset('images/produtos/'.$produto->imagem) }}">

<h4>{{ $produto->nome }}</h4>

<p>R$ {{ $produto->preco }}</p>

<a href="/produto/{{ $produto->id }}" class="btn2">Ver</a>

<form action="/carrinho/add" method="POST">
@csrf
<input type="hidden" name="id" value="{{ $produto->id }}">
<button class="btn">Comprar</button>
</form>

<form action="/favoritos/add" method="POST">
@csrf
<input type="hidden" name="id" value="{{ $produto->id }}">
<button class="btn2">❤</button>
</form>

</div>

@endforeach

</div>

@endsection
