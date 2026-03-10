<!DOCTYPE html>
<html>

<head>

<title>Criar Conta</title>

<style>

body{
background:#F5F5F3;
font-family:Arial;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.box{

background:white;
padding:40px;
width:350px;
border-radius:10px;
box-shadow:0 5px 20px rgba(0,0,0,0.1);

}

h2{
text-align:center;
color:#0D1B2A;
}

input{

width:100%;
padding:10px;
margin-top:10px;
border:1px solid #ddd;
border-radius:6px;

}

button{

width:100%;
margin-top:15px;
padding:10px;
background:#0D1B2A;
color:white;
border:none;
border-radius:6px;

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

