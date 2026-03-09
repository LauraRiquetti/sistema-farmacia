<!DOCTYPE html>
<html>

<head>

<title>Cadastro</title>

<style>

body{
font-family:Arial;
background:#f5f6fa;
display:flex;
align-items:center;
justify-content:center;
height:100vh;
}

.box{
background:white;
padding:40px;
border-radius:12px;
width:320px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

h2{
text-align:center;
color:#0B1F3A;
}

input{
width:100%;
padding:10px;
margin:10px 0;
border-radius:6px;
border:1px solid #ddd;
}

button{
width:100%;
padding:10px;
background:#E63946;
color:white;
border:none;
border-radius:8px;
}

</style>

</head>

<body>

<div class="box">

<h2>Criar Conta</h2>

<form method="POST" action="/register">

@csrf

<input type="text" name="name" placeholder="Nome">

<input type="email" name="email" placeholder="Email">

<input type="password" name="password" placeholder="Senha">

<button>Cadastrar</button>

</form>

</div>

</body>
</html>
