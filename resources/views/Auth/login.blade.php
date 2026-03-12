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



/* LINK */

.link-auth
{
    margin-top: 10px;
    display: block;
    text-align: center;
}

</style>



<div class="container-auth">

    <div class="card-auth">

        <h2>Entrar</h2>

        <form>

            <div class="input-group">

                <span class="icon">📧</span>

                <input 
                    class="input-auth"
                    type="email"
                    placeholder="Email"
                >

            </div>


            <div class="input-group">

                <span class="icon">🔒</span>

                <input 
                    id="senha"
                    class="input-auth"
                    type="password"
                    placeholder="Senha"
                >

            </div>


            <button class="btn-auth">

                Entrar

            </button>

        </form>


        <a 
            class="link-auth"
            href="/cadastro"
        >

            Não tem conta? Cadastre-se

        </a>

    </div>

</div>

@endsection
