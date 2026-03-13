@extends('layouts.app')

@section('content')

<style>

body{
    background: #f4f4f4;
    font-family: Arial, Helvetica, sans-serif;
}

.container-auth{
    height: 95vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.card-auth{
    background: white;
    padding: 30px;
    width: 420px;
    border-radius: 10px;
    box-shadow: 0px 5px 20px rgba(0,0,0,0.1);
}

.card-auth h2{
    margin-bottom: 20px;
    text-align: center;
}

.input-group{
    position: relative;
    margin-bottom: 12px;
}

.input-auth{
    width: 100%;
    padding: 10px 35px;
    border-radius: 6px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    font-size: 14px;
}

.icon{
    position: absolute;
    left: 10px;
    top: 9px;
}

.btn-auth{
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 6px;
    background: #d40000;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.btn-auth:hover{
    background: #a80000;
}

</style>

<div class="container-auth">

<div class="card-auth">

<h2>Criar Conta</h2>

<form method="POST" action="{{ route('usuarios.store') }}">
@csrf

<div class="input-group">
<span class="icon">👤</span>
<input class="input-auth" type="text" name="nome" placeholder="Nome completo" required>
</div>

<div class="input-group">
<span class="icon">🎂</span>
<input class="input-auth" type="date" name="data_nascimento" required>
</div>

<div class="input-group">
<span class="icon">📧</span>
<input class="input-auth" type="email" name="email" placeholder="Email" required>
</div>

<div class="input-group">
<span class="icon">🪪</span>
<input class="input-auth" type="text" name="cpf" placeholder="CPF" required>
</div>

<div class="input-group">
<span class="icon">📱</span>
<input class="input-auth" type="text" name="telefone" placeholder="Telefone">
</div>

<div class="input-group">
<span class="icon">📍</span>
<input class="input-auth" id="cep" type="text" name="cep" placeholder="CEP">
</div>

<div class="input-group">
<span class="icon">🏠</span>
<input class="input-auth" id="rua" type="text" name="rua" placeholder="Rua">
</div>

<div class="input-group">
<span class="icon">🔢</span>
<input class="input-auth" type="text" name="numero" placeholder="Número">
</div>

<div class="input-group">
<span class="icon">📍</span>
<input class="input-auth" id="bairro" type="text" name="bairro" placeholder="Bairro">
</div>

<div class="input-group">
<span class="icon">🌆</span>
<input class="input-auth" id="cidade" type="text" name="cidade" placeholder="Cidade">
</div>

<div class="input-group">
<span class="icon">🗺️</span>
<input class="input-auth" id="estado" name="estado" type="text" placeholder="Estado">
</div>

<div class="input-group">
<span class="icon">🔒</span>
<input class="input-auth" type="password" name="password" placeholder="Senha" required>
</div>

<button type="submit" class="btn-auth">
Cadastrar
</button>

</form>

</div>
</div>

<script>

document.getElementById("cep").addEventListener("blur", function(){

let cep = this.value.replace(/\D/g,'');

if(cep.length != 8){
return;
}

fetch("https://viacep.com.br/ws/" + cep + "/json/")
.then(function(response){
return response.json();
})
.then(function(dados){

if(dados.erro){
alert("CEP não encontrado");
return;
}

document.getElementById("rua").value = dados.logradouro;
document.getElementById("bairro").value = dados.bairro;
document.getElementById("cidade").value = dados.localidade;
document.getElementById("estado").value = dados.uf;

});

});

</script>

@endsection