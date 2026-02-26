@extends('layouts.app')

@section('content')

<div class="top-bar">
    <h2>Produtos</h2>
    <a href="{{ route('produtos.create') }}" class="btn btn-primary">+ Novo Produto</a>
</div>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produtos as $produto)
        <tr>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->quantidade }}</td>
            <td>R$ {{ $produto->preco }}</td>
            <td>
                <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-success">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

