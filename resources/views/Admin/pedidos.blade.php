@extends('layouts.app')

@section('conteudo')

<h2 style="padding:20px">Pedidos da Loja</h2>

<table>

<tr>

<th>ID</th>
<th>Cliente</th>
<th>Valor</th>
<th>Data</th>

</tr>

@foreach($pedidos as $pedido)

<tr>

<td>{{ $pedido->id }}</td>

<td>{{ $pedido->user->name }}</td>

<td>R$ {{ $pedido->valor }}</td>

<td>{{ $pedido->created_at }}</td>

</tr>

@endforeach

</table>

@endsection
