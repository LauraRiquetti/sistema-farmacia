@extends('layouts.app')

@section('content')

<h2>Nova Venda</h2>

<form action="{{ route('vendas.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Usuário</label>
        <select name="user_id">
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Valor</label>
        <input type="number" step="0.01" name="valor">
    </div>

    <button class="btn btn-primary">Salvar</button>
</form>

@endsection
