<!DOCTYPE html>
<html lang="pt-br">
<head>

<meta charset="UTF-8">
<title>Sistema Farmácia</title>

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

body{
margin:0;
font-family:Arial;
display:flex;
background:#F5F5F3; /* off white */
}

/* MENU LATERAL */

.sidebar{
width:230px;
height:100vh;
background:#0D1B2A; /* azul escuro */
color:white;
position:fixed;
}

.logo{
padding:20px;
font-size:20px;
font-weight:bold;
border-bottom:1px solid rgba(255,255,255,0.1);
}

.sidebar a{
display:block;
color:white;
text-decoration:none;
padding:14px 20px;
}

.sidebar a:hover{
background:#1B263B;
}

/* CONTEUDO */

.content{
margin-left:230px;
width:100%;
}

/* TOPO */

.topbar{
background:white;
padding:15px;
border-bottom:1px solid #ddd;
display:flex;
justify-content:space-between;
}

/* CARDS */

.cards{
display:flex;
gap:20px;
padding:30px;
}

.card{
background:white;
padding:20px;
border-radius:10px;
width:220px;
box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

/* TABELAS */

.table{
padding:30px;
}

table{
width:100%;
border-collapse:collapse;
background:white;
}

th{
background:#0D1B2A;
color:white;
padding:12px;
}

td{
padding:12px;
border-bottom:1px solid #eee;
}

/* BOTÕES */

.btn{
background:#0D1B2A;
color:white;
padding:8px 14px;
border:none;
border-radius:6px;
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

<div class="sidebar">

<div class="logo">💊 Farmácia</div>

<a href="/dashboard">Dashboard</a>
<a href="/usuarios">Usuários</a>
<a href="/produtos">Produtos</a>
<a href="/vendas">Vendas</a>
<a href="/colaboradores">Colaboradores</a>

</div>

<div class="content">

<div class="topbar">

<div>Painel Administrativo</div>

<div>Usuário Logado</div>

</div>

@yield('conteudo')

</div>

</body>
</html>
