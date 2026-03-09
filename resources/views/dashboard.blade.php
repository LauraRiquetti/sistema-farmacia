resources/views/dashboard.blade.php
@extends('layouts.app')

@section('conteudo')

<h2 style="padding:30px">Dashboard</h2>

<div class="cards">

<div class="card">
<h3>Total de Usuários</h3>
<p>{{ $usuarios }}</p>
</div>

<div class="card">
<h3>Produtos</h3>
<p>{{ $produtos }}</p>
</div>

<div class="card">
<h3>Vendas do Mês</h3>
<p>R$ {{ $vendas }}</p>
</div>

<div class="card">
<h3>Colaboradores</h3>
<p>{{ $colaboradores }}</p>
</div>

</div>

@endsection
