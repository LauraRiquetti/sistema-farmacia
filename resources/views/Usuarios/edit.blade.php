@extends('layouts.app')

@section('content')

<h2>Editar Usuário</h2>

<form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="name" value="{{ $usuario->name }}">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{ $usuario->email }}">
    </div>

    <button class="btn btn-success">Atualizar</button>
</form>

@endsection
