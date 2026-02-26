@extends('layouts.app')

@section('content')

<div class="top-bar">
    <h2>Usuários</h2>
    <a href="{{ route('usuarios.create') }}" class="btn btn-primary">+ Novo Usuário</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>
            <td>
                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-success">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
