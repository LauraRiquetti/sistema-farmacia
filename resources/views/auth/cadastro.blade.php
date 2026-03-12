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
