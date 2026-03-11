@extends('layouts.app')

@section('content')

<div class="form-box">

<h2>

Criar Conta

</h2>

<input type="text" placeholder="Nome">

<input type="email" placeholder="Email">

<input type="password" placeholder="Senha">

<a href="/login"><button class="botao">

Cadastrar

</button></a>

</div>

@endsection
