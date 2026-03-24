@extends('layouts.app')

@section('content')

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
        width: 100%;
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
        transition: 0.3s;
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

    /* Classes novas para os erros */
    .input-error {
        border-color: #d40000 !important;
        background-color: #fff0f0;
    }

    .error-text {
        color: #d40000;
        font-size: 12px;
        margin-top: 4px;
        display: block;
        padding-left: 5px;
        font-weight: bold;
    }
</style>

<div class="container-auth">
    <div class="card-auth">
        <h2>Criar Conta</h2>

        <form action="{{ route('cadastro') }}" method="POST">
            @csrf

            <div class="input-group">
                <span class="icon">👤</span>
                <input class="input-auth @error('nome') input-error @enderror" type="text" name="nome" value="{{ old('nome') }}" placeholder="Nome completo" required>
                @error('nome') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="input-group">
                <span class="icon">📧</span>
                <input class="input-auth @error('email') input-error @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required pattern=".*@.*\.com" title="O e-mail deve conter @ e terminar com .com">
                @error('email') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="input-group">
                <span class="icon">📅</span>
                <input class="input-auth @error('data_nascimento') input-error @enderror" type="date" name="data_nascimento" value="{{ old('data_nascimento') }}" title="Data de Nascimento" required>
                @error('data_nascimento') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="input-row">
                <div class="input-group" style="flex: 2;">
                    <span class="icon">🪪</span>
                    <input class="input-auth @error('cpf') input-error @enderror" type="text" name="cpf" value="{{ old('cpf') }}" placeholder="CPF">
                    @error('cpf') <span class="error-text">{{ $message }}</span> @enderror
                </div>
                <div class="input-group" style="flex: 2;">
                    <span class="icon">📱</span>
                    <input class="input-auth @error('telefone') input-error @enderror" type="text" name="telefone" value="{{ old('telefone') }}" placeholder="Telefone">
                    @error('telefone') <span class="error-text">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="input-group">
                <span class="icon">📍</span>
                <input class="input-auth @error('CEP') input-error @enderror" id="cep" type="text" name="CEP" value="{{ old('CEP') }}" placeholder="CEP">
                @error('CEP') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="input-row">
                <div class="input-group" style="flex: 3;">
                    <span class="icon">🏠</span>
                    <input class="input-auth @error('rua') input-error @enderror" id="rua" type="text" name="rua" value="{{ old('rua') }}" placeholder="Rua">
                </div>
                <div class="input-group" style="flex: 1;">
                    <input class="input-auth no-icon @error('numero') input-error @enderror" type="text" name="numero" value="{{ old('numero') }}" placeholder="Nº">
                </div>
            </div>

            <div class="input-group">
                <span class="icon">📍</span>
                <input class="input-auth @error('bairro') input-error @enderror" id="bairro" type="text" name="bairro" value="{{ old('bairro') }}" placeholder="Bairro">
            </div>

            <div class="input-row">
                <div class="input-group" style="flex: 3;">
                    <span class="icon">🌆</span>
                    <input class="input-auth @error('cidade') input-error @enderror" id="cidade" type="text" name="cidade" value="{{ old('cidade') }}" placeholder="Cidade">
                </div>
                <div class="input-group" style="flex: 1.5;">
                    <input class="input-auth no-icon @error('estado') input-error @enderror" id="uf" type="text" name="estado" value="{{ old('estado') }}" placeholder="UF" maxlength="2">
                </div>
            </div>

            <div class="input-group">
                <span class="icon">🔒</span>
                <input class="input-auth @error('password') input-error @enderror" type="password" name="password" placeholder="Senha" required>
                @error('password') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn-auth">Cadastrar</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: "{{ session('success') }}",
            timer: 3000
        });
    </script>
@endif

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