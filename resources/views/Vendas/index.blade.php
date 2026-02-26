@extends('layouts.app')

@section('content')

<div class="top-bar">
    <h2>Vendas</h2>
    <a href="{{ route('vendas.create') }}" class="btn btn-primary">+ Nova Venda</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Valor</th>
            <th>Data</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vendas as $venda)
        <tr>
            <td>{{ $venda->id }}</td>
            <td>{{ $venda->usuario->name ?? '' }}</td>
            <td>R$ {{ $venda->valor }}</td>
            <td>{{ $venda->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
