@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<style>
    body {
        background: #f4f4f4;
        font-family: Arial, Helvetica, sans-serif;
    }

    .container-auth {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px 0;
    }

    .card-auth {
        background: white;
        padding: 40px;
        width: 100%;
        max-width: 450px;
        border-radius: 10px;
        box-shadow: 0px 5px 20px rgba(0,0,0,0.1);
    }

    .card-auth h2 { margin-bottom: 25px; text-align: center; }

    .input-group {
        position: relative;
        margin-bottom: 15px;
    }

    .input-row {
        display: flex;
        gap: 10px;
    }

    .input-auth {
        width: 100%;
        padding: 12px 40px;
        border-radius: 6px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 14px;
    }

    .no-icon { padding-left: 15px; }

    .icon {
        position: absolute;
        left: 12px;
        top: 12px;
        z-index: 10;
    }

    .btn-auth {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 6px;
        background: #d40000;
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        margin-top: 10px;
    }

    .btn-auth:hover { background: #a80000; }
</style>

<div class="container-auth">
    <div class="card-auth">
        <h2>Criar Conta</h2>

        <form action="{{ route('cadastro') }}" method="POST">
            @csrf

            <div class="input-group">
                <span class="icon">👤</span>
                <input class="input-auth" type="text" name="nome" placeholder="Nome completo" required>
            </div>

            <div class="input-group">
                <span class="icon">📧</span>
                <input class="input-auth" type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-group">
                <span class="icon">📅</span>
                <input class="input-auth" type="date" name="data_nascimento" title="Data de Nascimento" required>
            </div>

            <div class="input-row">
                <div class="input-group" style="flex: 2;">
                    <span class="icon">🪪</span>
                    <input class="input-auth" type="text" name="cpf" placeholder="CPF">
                </div>
                <div class="input-group" style="flex: 2;">
                    <span class="icon">📱</span>
                    <input class="input-auth" type="text" name="telefone" placeholder="Telefone">
                </div>
            </div>

            <div class="input-group">
                <span class="icon">📍</span>
                <input class="input-auth" id="cep" type="text" name="CEP" placeholder="CEP">
            </div>

            <div class="input-row">
                <div class="input-group" style="flex: 3;">
                    <span class="icon">🏠</span>
                    <input class="input-auth" id="rua" type="text" name="rua" placeholder="Rua">
                </div>
                <div class="input-group" style="flex: 1;">
                    <input class="input-auth no-icon" type="text" name="numero" placeholder="Nº">
                </div>
            </div>

            <div class="input-group">
                <span class="icon">📍</span>
                <input class="input-auth" id="bairro" type="text" name="bairro" placeholder="Bairro">
            </div>

            <div class="input-row">
                <div class="input-group" style="flex: 3;">
                    <span class="icon">🌆</span>
                    <input class="input-auth" id="cidade" type="text" name="cidade" placeholder="Cidade">
                </div>
                <div class="input-group" style="flex: 1.5;">
                    <input class="input-auth no-icon" id="uf" type="text" name="estado" placeholder="UF" maxlength="2">
                </div>
            </div>

            <div class="input-group">
                <span class="icon">🔒</span>
                <input class="input-auth" type="password" name="password" placeholder="Senha" required>
            </div>

            <button type="submit" class="btn-auth">Cadastrar</button>
        </form>
    </div>
</div>

<script>
document.getElementById("cep").addEventListener("blur", function(){
    let cep = this.value.replace(/\D/g,'');
    if(cep.length != 8) return;

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
        document.getElementById("uf").value = dados.uf; 
    });
});
</script>

@endsection