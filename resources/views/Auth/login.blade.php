@extends('layouts.app')

@section('content')

<div class="form-box">


<h2>Entrar</h2>

<form method="POST" action="/login">

@csrf

<input type="email" name="email" placeholder="Email">

<input type="password" name="password" placeholder="Senha">

<a href="{{ route('home') }}"><button type="button" class="btn btn-primary">Entrar</button></a>
</form>

<p style="text-align:center,margin-top:10px,"> Não tem conta?
<a href="/cadastro">Cadastre-se</a>
</p>

</div>

@endsection
