@extends('layouts.app')

@section('content')

<style>

body
{
    background:#f5f5f5;
    font-family:Arial;
}

.container
{
    width:92%;
    margin:auto;
}

/* TOPO */

.topo
{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.busca
{
    padding:10px;
    width:280px;
    border-radius:6px;
    border:1px solid #ccc;
}

.carrinho
{
    background:#111827;
    color:white;
    padding:8px 15px;
    border-radius:6px;
}

/* CARROSSEL */

.carousel
{
    width:100%;
    height:280px;
    overflow:hidden;
    border-radius:10px;
    margin-bottom:30px;
}

.slide
{
    width:100%;
    height:280px;
    object-fit:cover;
    display:none;
}

.slide.active
{
    display:block;
}

/* CATEGORIAS */

.categorias
{
    display:flex;
    gap:10px;
    flex-wrap:wrap;
    margin-bottom:25px;
}

.categoria
{
    background:#eeeeee;
    padding:8px 18px;
    border-radius:20px;
    cursor:pointer;
}

.categoria:hover
{
    background:#111827;
    color:white;
}

/* PRODUTOS */

.produtos
{
    display:grid;
    grid-template-columns:repeat(5,1fr);
    gap:20px;
}

.produto
{
    background:white;
    padding:15px;
    border-radius:10px;
    text-align:center;
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
    transition:0.2s;
}

.produto:hover
{
    transform:translateY(-5px);
}

.produto img
{
    width:140px;
    height:140px;
    object-fit:cover;
}

.preco
{
    color:red;
    font-weight:bold;
}

.botao
{
    margin-top:10px;
    padding:8px 14px;
    border:none;
    background:#111827;
    color:white;
    border-radius:6px;
    cursor:pointer;
}

</style>



<div class="container">

<div class="topo">

<h2>Farmácia Online</h2>

<input class="busca" placeholder="Buscar produto..." onkeyup="buscar(this.value)">

<div class="carrinho">
🛒 <span id="qtd">0</span>
</div>

</div>



<!-- CARROSSEL -->

<div class="carousel">

<img class="slide active" src="https://picsum.photos/1200/300?random=1">

<img class="slide" src="https://picsum.photos/1200/300?random=2">

<img class="slide" src="https://picsum.photos/1200/300?random=3">

</div>



<!-- CATEGORIAS -->

<div class="categorias">

<div class="categoria" onclick="filtrar('todos')">Todos</div>
<div class="categoria" onclick="filtrar('farmacia')">Farmácia</div>
<div class="categoria" onclick="filtrar('beleza')">Beleza</div>
<div class="categoria" onclick="filtrar('vitaminas')">Vitaminas</div>
<div class="categoria" onclick="filtrar('infantil')">Infantil</div>
<div class="categoria" onclick="filtrar('pet')">Pet</div>
<div class="categoria" onclick="filtrar('higiene')">Higiene</div>

</div>



<div class="produtos" id="listaProdutos"></div>

</div>



<script>

/* LISTA DE NOMES */

let nomes = [
"Paracetamol","Dipirona","Ibuprofeno","Dorflex","Vitamina C","Vitamina D",
"Álcool 70%","Sabonete Antibacteriano","Shampoo","Condicionador",
"Creme Dental","Enxaguante Bucal","Protetor Solar","Hidratante Corporal",
"Fralda Infantil","Lenço Umedecido","Pomada Infantil","Termômetro",
"Vermífugo Pet","Shampoo Pet"
]

let categorias = [
"farmacia","farmacia","farmacia","farmacia","vitaminas","vitaminas",
"higiene","higiene","beleza","beleza",
"higiene","higiene","beleza","beleza",
"infantil","infantil","infantil","farmacia",
"pet","pet"
]

let container = document.getElementById("listaProdutos")

for(let i=1;i<=100;i++)
{

let nome = nomes[i % nomes.length]

let categoria = categorias[i % categorias.length]

let preco = (Math.random()*40+10).toFixed(2)

container.innerHTML += `

<div class="produto" data-categoria="${categoria}" data-nome="${nome.toLowerCase()}">

<img src="https://picsum.photos/200?random=${i}">

<h4>${nome}</h4>

<p class="preco">R$ ${preco}</p>

<button class="botao" onclick="addCarrinho()">Adicionar</button>

</div>

`

}



/* BUSCA */

function buscar(txt)
{

txt = txt.toLowerCase()

let produtos = document.querySelectorAll(".produto")

produtos.forEach(p=>{

if(p.dataset.nome.includes(txt))
p.style.display="block"
else
p.style.display="none"

})

}



/* FILTRO */

function filtrar(cat)
{

let produtos = document.querySelectorAll(".produto")

produtos.forEach(p=>{

if(cat=="todos" || p.dataset.categoria==cat)
p.style.display="block"
else
p.style.display="none"

})

}



/* CARRINHO */

let carrinho = 0

function addCarrinho()
{

carrinho++

document.getElementById("qtd").innerText = carrinho

}



/* CARROSSEL */

let slides = document.querySelectorAll(".slide")

let index = 0

setInterval(function(){

slides[index].classList.remove("active")

index++

if(index >= slides.length)
index = 0

slides[index].classList.add("active")

},3000)

</script>

@endsection
