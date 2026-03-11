@extends('layouts.app')

@section('content')

<div class="container">

<h2>

Dashboard Administrativo

</h2>

<div style="display:flex; gap:20px">

<div style="background:white;padding:20px;border-radius:10px">

<h3>

Usuários

</h3>

<h1>

{{ $usuarios }}

</h1>

</div>

<div style="background:white;padding:20px;border-radius:10px">

<h3>

Vendas

</h3>

<h1>

{{ $vendas }}

</h1>

</div>

</div>

<br>

<div style="background:white;padding:20px;border-radius:10px">

<canvas id="grafico"></canvas>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('grafico');

new Chart(ctx,{

type:'bar',

data:{

labels:['Jan','Fev','Mar','Abr','Mai'],

datasets:[{

label:'Vendas',

data:[12,19,8,15,9]

}]

}

});

</script>

</div>

@endsection
