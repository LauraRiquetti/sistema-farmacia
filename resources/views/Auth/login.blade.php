@extends('layouts.app')

@section('content')

<div class="form-box">


<h2>Entrar</h2>

<form method="POST" action="/login">

@csrf

<input type="email" name="email" placeholder="Email">

<input type="password" name="password" placeholder="Senha">

<button type="submit">Entrar</button>
</form>

<p style="text-align:center,margin-top:10px,"> Não tem conta?
<a href="/cadastro">Cadastre-se</a>
</p>

</div>

@endsection
