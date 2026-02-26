@extends('layouts.app')

@section('content')

<h2>Novo Usuário</h2>

<form action="{{ route('usuarios.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="name" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" required>
    </div>

    <div class="form-group">
        <label>Senha</label>
        <input type="password" name="password" required>
    </div>

    <button class="btn btn-primary">Salvar</button>
</form>

@endsection
