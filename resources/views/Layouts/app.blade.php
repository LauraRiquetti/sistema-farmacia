<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Farmácia+</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    background-color: #ecedee;
    display: flex;
}

/* SIDEBAR */
.sidebar {
    width: 240px;
    height: 100vh;
    background: linear-gradient(180deg, #16678d, #022f49);
    padding: 20px;
    color: white;
    position: fixed;
}

.sidebar h2 {
    text-align: center;
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    color: white;
    text-decoration: none;
    padding: 12px;
    border-radius: 12px;
    margin-bottom: 10px;
    transition: 0.3s;
}

.sidebar a:hover {
    background: rgba(219, 115, 115, 0.2);
}

/* MAIN */
.main {
    margin-left: 240px;
    width: 100%;
}

/* NAVBAR */

.navbar h3 {
    color: #5d829b;
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

.card h4 {
    color: #255779;
}

.card p {
    font-size: 22px;
    font-weight: bold;
    color: #142b69;
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

input:focus {
    outline: none;
    border-color: #305075;
}

.btn2{
background:#0D1B2A;
color:white;
border:none;
padding:8px 12px;
border-radius:5px;
cursor:pointer;
}

.btn-primary { background: #1f5281; color: white; }
.btn-success { background: #19407a; color: white; }
.btn-danger  { background: #1b547a; color: white; }

/* TABLE */
table {
    width: 100%;
    background: white;
    border-radius: 15px;
    overflow: hidden;
    margin-top: 20px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
}

table th, table td {
    padding: 15px;
    text-align: left;
}

table th {
    background: #19435f;
    color: white;
}

table tr:nth-child(even) {
    background: #f8f9fa;
}

.top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
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
