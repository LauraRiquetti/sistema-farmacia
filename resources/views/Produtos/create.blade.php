@extends('layouts.app')

@section('content')

<h2>Novo Produto</h2>

<form action="{{ route('produtos.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome" required>
    </div>

    <div class="form-group">
        <label>Quantidade</label>
        <input type="number" name="quantidade" required>
    </div>

    <div class="form-group">
        <label>Preço</label>
        <input type="number" step="0.01" name="preco" required>
    </div>

    <button class="btn btn-primary">Salvar</button>
</form>

@endsection
