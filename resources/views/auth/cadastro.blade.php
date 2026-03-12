@extends('layouts.app')

@section('content')

<style>

body
{
    background: #f4f4f4;
    font-family: Arial, Helvetica, sans-serif;
}



.container-auth
{
    height: 95vh;
    display: flex;
    justify-content: center;
    align-items: center;
}



.card-auth
{
    background: white;
    padding: 40px;
    width: 420px;
    border-radius: 10px;
    box-shadow: 0px 5px 20px rgba(0,0,0,0.1);
}



.card-auth h2
{
    margin-bottom: 25px;
}



.input-group
{
    position: relative;
    margin-bottom: 15px;
}



.input-auth
{
    width: 100%;
    padding: 12px 40px;
    border-radius: 6px;
    border: 1px solid #ccc;
}



.icon
{
    position: absolute;
    left: 12px;
    top: 12px;
}



.btn-auth
{
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 6px;
    background: #d40000;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}



.btn-auth:hover
{
    background: #a80000;
}

</style>



<div class="container-auth">

    <div class="card-auth">

        <h2>Criar Conta</h2>

        <form>

            <div class="input-group">

                <span class="icon">👤</span>

                <input class="input-auth" type="text" placeholder="Nome completo">

            </div>


            <div class="input-group">

                <span class="icon">📧</span>

                <input class="input-auth" type="email" placeholder="Email">

            </div>


            <div class="input-group">

                <span class="icon">🪪</span>

                <input class="input-auth" type="text" placeholder="CPF">

            </div>


            <div class="input-group">

                <span class="icon">📱</span>

                <input class="input-auth" type="text" placeholder="Telefone">

            </div>


            <div class="input-group">

                <span class="icon">📍</span>

                <input class="input-auth" type="text" placeholder="CEP">

            </div>


            <div class="input-group">

                <span class="icon">🏠</span>

                <input class="input-auth" type="text" placeholder="Rua">

            </div>


            <div class="input-group">

                <span class="icon">📍</span>

                <input class="input-auth" type="text" placeholder="Bairro">

            </div>


            <div class="input-group">

                <span class="icon">🌆</span>

                <input class="input-auth" type="text" placeholder="Cidade">

            </div>


            <div class="input-group">

                <span class="icon">🔒</span>

                <input class="input-auth" type="password" placeholder="Senha">

            </div>


            <button class="btn-auth">

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

    fetch("https://viacep.com.br/ws/"+cep+"/json/")
    .then(res => res.json())
    .then(dados => {

        if(dados.erro){
            alert("CEP não encontrado");
            return;
        }

        document.getElementById("rua").value = dados.logradouro;
        document.getElementById("bairro").value = dados.bairro;
        document.getElementById("cidade").value = dados.localidade;

    });

});

</script>

@endsection
