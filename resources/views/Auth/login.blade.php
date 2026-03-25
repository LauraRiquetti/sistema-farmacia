@extends('layouts.app')

@section('content')

<style>

body
{
    background: #f4f4f4;
    font-family: Arial, Helvetica, sans-serif;
}

/* CENTRALIZAR */
.container-auth
{
    height: 90vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* CARD */
.card-auth
{
    background: white;
    padding: 40px;
    width: 380px;
    border-radius: 10px;
    box-shadow: 0px 5px 20px rgba(0,0,0,0.1);
}

/* TITULO */
.card-auth h2
{
    margin-bottom: 25px;
}

/* INPUT GROUP */
.input-group
{
    position: relative;
    margin-bottom: 18px;
}

/* INPUT */
.input-auth
{
    width: 100%;
    padding: 12px 40px;
    border-radius: 6px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* ICON */
.icon
{
    position: absolute;
    left: 12px;
    top: 12px;
}

/* BOTÃO */
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

/* LINKS */
.link-auth
{
    margin-top: 15px;
    display: block;
    text-align: center;
    color: #333;
    text-decoration: none;
}
.link-auth:hover { text-decoration: underline; }

/* ESQUECI A SENHA */
.link-esqueci 
{
    display: block;
    text-align: right;
    font-size: 13px;
    color: #666;
    margin-bottom: 15px;
    margin-top: -10px;
    text-decoration: none;
}
.link-esqueci:hover { color: #d40000; text-decoration: underline; }

</style>


<div class="container-auth">
    <div class="card-auth">

        <h2>Entrar</h2>

        @if (session('status'))
            <div style="background: #dcfce7; color: #15803d; padding: 10px; border-radius: 6px; margin-bottom: 15px; font-size: 14px;">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div style="background: #ffcccc; color: #d40000; padding: 10px; margin-bottom: 10px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input-group">
                <span class="icon">📧</span>
                <input class="input-auth" type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-group">
                <span class="icon">🔒</span>
                <input class="input-auth" type="password" name="password" placeholder="Senha" required>
            </div>

            <a href="{{ route('password.request') }}" class="link-esqueci">Esqueci minha senha</a>

            <button type="submit" class="btn-auth">Entrar</button>
        </form>

        <a class="link-auth" href="/cadastro">
            Não tem conta? Cadastre-se
        </a>

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

@endsection