@extends('layouts.app')

@section('content')

<div class="form-box">

    <h2>
        Criar Conta
    </h2>


    <input
        type="text"
        placeholder="Nome completo"
    >


    <input
        type="email"
        placeholder="Email"
    >


    <input
        type="text"
        id="cpf"
        placeholder="CPF"
    >


    <input
        type="text"
        id="telefone"
        placeholder="Telefone"
    >


    <input
        type="text"
        id="cep"
        placeholder="CEP"
    >


    <input
        type="text"
        id="rua"
        placeholder="Rua"
    >


    <input
        type="text"
        id="bairro"
        placeholder="Bairro"
    >


    <input
        type="text"
        id="cidade"
        placeholder="Cidade"
    >


    <input
        type="password"
        placeholder="Senha"
    >


    <button class="botao">

        Cadastrar

    </button>

</div>



<script>

document.getElementById("cep").addEventListener("blur", function(){

    let cep = this.value.replace(/\D/g,'');

    fetch("https://viacep.com.br/ws/"+cep+"/json/")

    .then(res => res.json())

    .then(dados => {

        document.getElementById("rua").value = dados.logradouro;
        document.getElementById("bairro").value = dados.bairro;
        document.getElementById("cidade").value = dados.localidade;

    });

});



document.getElementById("telefone").addEventListener("input", function(){

    let x = this.value.replace(/\D/g,'');

    x = x.replace(/^(\d{2})(\d)/g,"($1) $2");
    x = x.replace(/(\d{5})(\d)/,"$1-$2");

    this.value = x;

});



document.getElementById("cpf").addEventListener("input", function(){

    let x = this.value.replace(/\D/g,'');

    x = x.replace(/(\d{3})(\d)/,"$1.$2");
    x = x.replace(/(\d{3})(\d)/,"$1.$2");
    x = x.replace(/(\d{3})(\d{1,2})$/,"$1-$2");

    this.value = x;

});

</script>

@endsection
