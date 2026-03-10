@extends('layouts.app')

@section('conteudo')

<div style="padding:30px">

<h2>Carrinho de Compras</h2>

<table>

<tr>

<th>Produto</th>
<th>Preço</th>
<th>Quantidade</th>
<th>Total</th>
<th>Ação</th>

</tr>

@php
$total = 0;
@endphp

@foreach(session('carrinho',[]) as $id => $produto)

@php
$subtotal = $produto['preco'] * $produto['quantidade'];
$total += $subtotal;
@endphp

<tr>

<td>{{ $produto['nome'] }}</td>

<td>R$ {{ $produto['preco'] }}</td>

<td>{{ $produto['quantidade'] }}</td>

<td>R$ {{ $subtotal }}</td>

<td>

<form action="/carrinho/remover/{{$id}}" method="POST">
@csrf
<button class="btn">Remover</button>
</form>

</td>

</tr>

@endforeach

</table>

<h3 style="margin-top:20px">Total: R$ {{ $total }}</h3>

<form action="/finalizar-compra" method="POST">

@csrf

<button class="btn">Finalizar Compra</button>

</form>

</div>

@endsection
