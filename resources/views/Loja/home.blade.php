@extends('layouts.app')

@section('content')

<style>

.container
{
    width: 90%;
    margin: auto;
}


/* CARROSSEL */

.carousel
{
    width: 100%;
    height: 260px;
    overflow: hidden;
    border-radius: 10px;
    margin-bottom: 40px;
}

.slide
{
    width: 100%;
    height: 260px;
    object-fit: cover;
    display: none;
}

.slide.active
{
    display: block;
}


/* TITULOS */

.titulo
{
    margin-bottom: 20px;
}


/* CATEGORIAS */

.categorias
{
    display: flex;
    gap: 15px;
    margin-bottom: 40px;
}

.categoria
{
    background: #eeeeee;
    padding: 8px 18px;
    border-radius: 20px;
    cursor: pointer;
}


/* PRODUTOS */

.produtos
{
    display: grid;
    grid-template-columns: repeat(4,1fr);
    gap: 25px;
}

.produto
{
    background: white;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0px 3px 10px rgba(0,0,0,0.1);
}

.produto img
{
    width: 150px;
    height: 150px;
    object-fit: contain;
}

.preco
{
    color: red;
    font-weight: bold;
}

.botao
{
    margin-top: 10px;
    padding: 8px 16px;
    border: none;
    background: #111827;
    color: white;
    border-radius: 6px;
    cursor: pointer;
}

</style>


<div class="container">


<!-- CARROSSEL -->

<div class="carousel">

    <img class="slide active" src="https://source.unsplash.com/1200x300/?pharmacy">

    <img class="slide" src="https://source.unsplash.com/1200x300/?medicine">

    <img class="slide" src="https://source.unsplash.com/1200x300/?drugstore">

</div>


<!-- CATEGORIAS -->

<h2 class="titulo">Categorias</h2>

<div class="categorias">

    <div class="categoria" onclick="filtrar('todos')">Todos</div>

    <div class="categoria" onclick="filtrar('farmacia')">Farmácia</div>

    <div class="categoria" onclick="filtrar('beleza')">Beleza</div>

    <div class="categoria" onclick="filtrar('vitaminas')">Vitaminas</div>

    <div class="categoria" onclick="filtrar('infantil')">Infantil</div>

    <div class="categoria" onclick="filtrar('pet')">Pet</div>

    <div class="categoria" onclick="filtrar('higiene')">Higiene</div>

</div>


<!-- PRODUTOS -->

<h2 class="titulo">Produtos em destaque</h2>


<div class="produtos">


<div class="produto" data-categoria="farmacia">

    <img src="https://source.unsplash.com/200x200/?pill">

    <h4>Paracetamol 750mg</h4>

    <p class="preco">R$ 12,90</p>

    <button class="botao">Comprar</button>

</div>


<div class="produto" data-categoria="farmacia">

    <img src="https://source.unsplash.com/200x200/?medicine">

    <h4>Dorflex</h4>

    <p class="preco">R$ 9,90</p>

    <button class="botao">Comprar</button>

</div>


<div class="produto" data-categoria="farmacia">

    <img src="https://source.unsplash.com/200x200/?capsule">

    <h4>Ibuprofeno</h4>

    <p class="preco">R$ 14,90</p>

    <button class="botao">Comprar</button>

</div>


<div class="produto" data-categoria="vitaminas">

    <img src="https://source.unsplash.com/200x200/?vitamins">

    <h4>Vitamina C</h4>

    <p class="preco">R$ 22,90</p>

    <button class="botao">Comprar</button>

</div>


<div class="produto" data-categoria="beleza">

    <img src="https://source.unsplash.com/200x200/?cosmetics">

    <h4>Creme Facial</h4>

    <p class="preco">R$ 35,90</p>

    <button class="botao">Comprar</button>

</div>


<div class="produto" data-categoria="infantil">

    <img src="https://source.unsplash.com/200x200/?baby">

    <h4>Pomada Infantil</h4>

    <p class="preco">R$ 18,90</p>

    <button class="botao">Comprar</button>

</div>


<div class="produto" data-categoria="pet">

    <img src="https://source.unsplash.com/200x200/?pet-medicine">

    <h4>Vermífugo Pet</h4>

    <p class="preco">R$ 29,90</p>

    <button class="botao">Comprar</button>

</div>


<div class="produto" data-categoria="higiene">

    <img src="https://source.unsplash.com/200x200/?soap">

    <h4>Sabonete</h4>

    <p class="preco">R$ 4,90</p>

    <button class="botao">Comprar</button>

</div>


</div>

</div>



<script>

/* FILTRO DE CATEGORIAS */

function filtrar(categoria)
{
    let produtos = document.querySelectorAll(".produto")

    produtos.forEach(function(produto)
    {
        if(categoria == "todos")
        {
            produto.style.display = "block"
        }
        else
        {
            if(produto.dataset.categoria == categoria)
            {
                produto.style.display = "block"
            }
            else
            {
                produto.style.display = "none"
            }
        }
    })
}


/* CARROSSEL AUTOMATICO */

let slides = document.querySelectorAll(".slide")

let index = 0

setInterval(function(){

    slides[index].classList.remove("active")

    index++

    if(index >= slides.length)
    {
        index = 0
    }

    slides[index].classList.add("active")

},3000)

</script>

@endsection
