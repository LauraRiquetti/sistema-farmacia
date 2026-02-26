@extends('layouts.app')

@section('content')

<h2>Colaboradores</h2>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Perfil</th>
        </tr>
    </thead>
    <tbody>
        @foreach($colaboradores as $colaborador)
        <tr>
            <td>{{ $colaborador->name }}</td>
            <td>{{ $colaborador->email }}</td>
            <td>{{ $colaborador->role }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
