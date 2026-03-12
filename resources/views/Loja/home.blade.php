@extends('layouts.app')

@section('content')

<div class="container">

    <!-- CARROSSEL -->

    <div class="carousel">

        <img class="slide active" src="https://images.unsplash.com/photo-1588776814546-ec7e4b5a20b0">
        <img class="slide" src="https://images.unsplash.com/photo-1587854692152-cbe660dbde88">
        <img class="slide" src="https://images.unsplash.com/photo-1607619056574-7b8d3ee536b2">

    </div>


    <!-- CATEGORIAS -->

    <h2 class="titulo">

        Categorias

    </h2>


    <div class="categorias">

        <div class="categoria">Farmácia</div>
        <div class="categoria">Beleza</div>
        <div class="categoria">Vitaminas</div>
        <div class="categoria">Infantil</div>
        <div class="categoria">Pet</div>
        <div class="categoria">Higiene</div>

    </div>


    <!-- PRODUTOS -->

    <h2 class="titulo">

        Produtos em destaque

    </h2>


    <div class="produtos">


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae">

            <h3>Paracetamol 750mg</h3>

            <p class="preco">R$ 12,90</p>

            <button>Comprar</button>

        </div>


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1584017911766-d451b3d0e843">

            <h3>Dorflex</h3>

            <p class="preco">R$ 9,90</p>

            <button>Comprar</button>

        </div>


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1573883431205-98b5f10aaedb">

            <h3>Dipirona</h3>

            <p class="preco">R$ 7,90</p>

            <button>Comprar</button>

        </div>


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1603398938378-e54eab446dde">

            <h3>Ibuprofeno</h3>

            <p class="preco">R$ 14,90</p>

            <button>Comprar</button>

        </div>


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1612538498456-e861df91d4d0">

            <h3>Vitamina C</h3>

            <p class="preco">R$ 19,90</p>

            <button>Comprar</button>

        </div>


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1626716493137-b67fe9501e76">

            <h3>Vitamina D</h3>

            <p class="preco">R$ 24,90</p>

            <button>Comprar</button>

        </div>


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1590080875515-8a3a8dc5735e">

            <h3>Shampoo</h3>

            <p class="preco">R$ 22,90</p>

            <button>Comprar</button>

        </div>


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1596462502278-27bfdc403348">

            <h3>Condicionador</h3>

            <p class="preco">R$ 22,90</p>

            <button>Comprar</button>

        </div>


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1608248597279-f99d160bfcbc">

            <h3>Protetor Solar</h3>

            <p class="preco">R$ 39,90</p>

            <button>Comprar</button>

        </div>


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1585238342028-78d387f4a707">

            <h3>Sabonete</h3>

            <p class="preco">R$ 4,90</p>

            <button>Comprar</button>

        </div>


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1585435557343-3b092031a831">

            <h3>Álcool 70%</h3>

            <p class="preco">R$ 8,90</p>

            <button>Comprar</button>

        </div>


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1581594693702-fbdc51b2763b">

            <h3>Termômetro</h3>

            <p class="preco">R$ 29,90</p>

            <button>Comprar</button>

        </div>


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1580281657521-7d0b1f2ed6e4">

            <h3>Fralda Infantil</h3>

            <p class="preco">R$ 49,90</p>

            <button>Comprar</button>

        </div>


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1597931752949-98c74b5b1594">

            <h3>Pomada</h3>

            <p class="preco">R$ 34,90</p>

            <button>Comprar</button>

        </div>


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1556228720-da4e85f25a3e">

            <h3>Escova Dental</h3>

            <p class="preco">R$ 9,90</p>

            <button>Comprar</button>

        </div>


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1607619056574-7b8d3ee536b2">

            <h3>Creme Dental</h3>

            <p class="preco">R$ 7,90</p>

            <button>Comprar</button>

        </div>


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1598300042247-d088f8ab3a91">

            <h3>Antialérgico</h3>

            <p class="preco">R$ 16,90</p>

            <button>Comprar</button>

        </div>


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1584367369853-4da2c7e02c1f">

            <h3>Xarope</h3>

            <p class="preco">R$ 21,90</p>

            <button>Comprar</button>

        </div>


        <div class="produto">

            <img src="https://images.unsplash.com/photo-1600959907703-125ba1374a12">

            <h3>Teste Covid</h3>

            <p class="preco">R$ 29,90</p>

            <button>Comprar</button>

        </div>


    </div>

</div>



<style>

.container
{
    width: 90%;
    margin: auto;
}


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


.titulo
{
    margin-bottom: 20px;
    color: #0d1b2a;
}


.categorias
{
    display: flex;
    gap: 20px;
    margin-bottom: 40px;
}


.categoria
{
    background: #e9ecef;
    padding: 10px 20px;
    border-radius: 20px;
}


.produtos
{
    display: grid;
    grid-template-columns: repeat(4,1fr);
    gap: 30px;
}


.produto
{
    background: white;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0px 2px 10px rgba(0,0,0,0.1);
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
    margin: 10px 0;
}


button
{
    background: #0d1b2a;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
}

</style>



<script>

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

},4000)

</script>

@endsection
