<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Sistema Farmácia</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    background-color: #F4F6F9;
    display: flex;
}

/* SIDEBAR */
.sidebar {
    width: 240px;
    height: 100vh;
    background: linear-gradient(180deg, #6C63FF, #20C997);
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
    background: rgba(255,255,255,0.2);
}

/* MAIN */
.main {
    margin-left: 240px;
    width: 100%;
}

/* NAVBAR */
.navbar {
    height: 60px;
    background: white;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 30px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.navbar h3 {
    color: #6C63FF;
}

/* CONTENT */
.content {
    padding: 30px;
}

/* CARDS */
.card-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.card {
    background: white;
    padding: 25px;
    border-radius: 20px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-5px);
}

.card h4 {
    color: #6C63FF;
}

.card p {
    font-size: 22px;
    font-weight: bold;
    color: #20C997;
}

/* FORM */
.form-group {
    margin-bottom: 15px;
}

input, select {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #ddd;
}

input:focus {
    outline: none;
    border-color: #6C63FF;
}

/* BUTTONS */
.btn {
    padding: 8px 15px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    font-weight: bold;
}

.btn-primary { background: #6C63FF; color: white; }
.btn-success { background: #20C997; color: white; }
.btn-danger  { background: #ff4d6d; color: white; }

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
    background: #6C63FF;
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
    <h2>💊 Farmácia</h2>
    <a href="/dashboard">Dashboard</a>
    <a href="/usuarios">Usuários</a>
    <a href="/produtos">Produtos</a>
    <a href="/vendas">Vendas</a>
    <a href="/colaboradores">Colaboradores</a>
</div>

<div class="main">
    <div class="navbar">
        <h3>Painel Administrativo</h3>
        <span>Usuário Logado</span>
    </div>

    <div class="content">
        @yield('content')
    </div>
</div>

</body>
</html>
