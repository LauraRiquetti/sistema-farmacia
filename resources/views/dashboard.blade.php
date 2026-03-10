@extends('layouts.app')

@section('conteudo')

<div class="cards">

<div class="card">

<h3>Usuários</h3>

<h2>{{ $usuarios }}</h2>

</div>

<div class="card">

<h3>Produtos</h3>

<h2>{{ $produtos }}</h2>

</div>

<div class="card">

<h3>Vendas</h3>

<h2>R$ {{ $vendas }}</h2>

</div>

<div class="card">

<h3>Colaboradores</h3>

<h2>{{ $colaboradores }}</h2>

</div>

</div>

@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<canvas id="graficoVendas"></canvas>

<script>

const ctx = document.getElementById('graficoVendas');

new Chart(ctx, {

type: 'bar',

data: {

labels: {!! json_encode($meses) !!},

datasets: [{

label: 'Vendas por mês',

data: {!! json_encode($totais) !!},

backgroundColor: '#E63946'

}]

}

});

</script>
