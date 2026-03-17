@extends('layouts.app')

@section('content')

<div class="container">

<h2>

Carrinho de Compras

</h2>

<table>

<thead>

<tr>

<th>
Produto
</th>

<th>
Preço
</th>

<th>
Quantidade
</th>

<th>
Total
</th>

</tr>

</thead>

<tbody>

@foreach($carrinho as $id => $item)
<tr>
    <td>{{ $item['nome'] }}</td>
    
    <td>R$ {{ number_format($item['valor'], 2, ',', '.') }}</td>
    
    <td>{{ $item['quantidade'] }}</td>
    
    <td>R$ {{ number_format($item['valor'] * $item['quantidade'], 2, ',', '.') }}</td>
</tr>
@endforeach

</tbody>

</table>

<br>

<button class="botao">

Finalizar Compra

</button>

</div>

@endsection
