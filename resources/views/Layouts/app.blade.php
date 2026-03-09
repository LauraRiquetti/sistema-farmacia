<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Farmácia+</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

body{
font-family:Arial;
margin:0;
background:#f5f5f5;
}

/* NAVBAR */

.navbar{
background:#0D1B2A;
padding:15px;
display:flex;
justify-content:space-between;
align-items:center;
}

.logo{
color:#E53935;
font-size:22px;
font-weight:bold;
}

.menu a{
color:white;
margin-left:15px;
text-decoration:none;
}

/* BUSCA */

.busca input{
padding:8px;
width:250px;
}

/* GRID PRODUTOS */

.grid{
display:grid;
grid-template-columns:repeat(auto-fill,220px);
gap:20px;
padding:30px;
}

.card{
background:white;
padding:15px;
border-radius:10px;
text-align:center;
box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.card img{
width:150px;
height:150px;
object-fit:contain;
}

.btn{
background:#E53935;
color:white;
border:none;
padding:8px 12px;
border-radius:5px;
cursor:pointer;
}

.btn2{
background:#0D1B2A;
color:white;
border:none;
padding:8px 12px;
border-radius:5px;
cursor:pointer;
}

</style>
</head>

<body>

<div class="navbar">

<div class="logo">Farmácia+</div>

<div class="busca">
<form action="/buscar" method="GET">
<input type="text" name="q" placeholder="Buscar medicamento">
</form>
</div>

<div class="menu">
<a href="/loja">Loja</a>
<a href="/carrinho">Carrinho</a>
<a href="/favoritos">Favoritos</a>
</div>

</div>

@yield('content')

</body>
</html>
