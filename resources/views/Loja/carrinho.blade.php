@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 40px; margin-bottom: 60px;">
    <h2 style="color: #1e3a8a; font-weight: bold; text-align: center; margin-bottom: 30px;">🛒 Meu Carrinho</h2>

    <div id="container-tabela-carrinho" style="display: none; background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead style="background-color: #1e3a8a; color: white;">
                <tr>
                    <th style="padding: 15px; text-align: center; font-size: 1.1rem;">Produto</th>
                    <th style="padding: 15px; text-align: center; font-size: 1.1rem;">Preço Unitário</th>
                    <th style="padding: 15px; text-align: center; font-size: 1.1rem;">Quantidade</th>
                    <th style="padding: 15px; text-align: center; font-size: 1.1rem;">Total</th>
                    <th style="padding: 15px; text-align: center; font-size: 1.1rem;">Ação</th>
                </tr>
            </thead>
            <tbody id="corpo-tabela-carrinho">
            </tbody>
        </table>
    </div>

    <div id="container-botoes" style="display: none; justify-content: space-between; align-items: center; margin-top: 30px;">
        <button onclick="limparCarrinho()" 
                style="background: transparent; color: #dc3545; border: 2px solid #dc3545; padding: 12px 24px; border-radius: 8px; font-weight: bold; cursor: pointer; transition: 0.3s;"
                onmouseover="this.style.backgroundColor='#dc3545'; this.style.color='white';"
                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#dc3545';">
            🗑️ Limpar Carrinho
        </button>

        <form id="form-checkout" action="{{ route('vendas.store') }}" method="POST" style="margin: 0;">
            @csrf
            <input type="hidden" name="carrinho_dados" id="carrinho_dados">
            
            <button type="button" onclick="prepararCheckout()" 
                    style="background-color: #28a745; color: white; border: none; padding: 14px 35px; border-radius: 8px; font-weight: bold; font-size: 1.1rem; cursor: pointer; box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3); transition: 0.3s;"
                    onmouseover="this.style.backgroundColor='#218838'; this.style.transform='scale(1.05)';"
                    onmouseout="this.style.backgroundColor='#28a745'; this.style.transform='scale(1)';">
                ✅ Finalizar Compra
            </button>
        </form>
    </div>

    <div id="container-vazio" style="display: none; text-align: center; padding: 60px 20px; background-color: #f8f9fa; border-radius: 12px; border: 1px dashed #ced4da; margin-top: 20px;">
        <h4 style="color: #6c757d; margin-bottom: 25px; font-size: 1.5rem;">Seu carrinho está vazio! 😔</h4>
        
        <a href="{{ route('produtos.index') }}" 
           style="display: inline-block; background-color: #1e3a8a; color: #ffffff; text-decoration: none; padding: 14px 30px; border-radius: 8px; font-weight: bold; font-size: 1.1rem; transition: 0.3s; box-shadow: 0 4px 10px rgba(30, 58, 138, 0.3);"
           onmouseover="this.style.backgroundColor='#152a61';"
           onmouseout="this.style.backgroundColor='#1e3a8a';">
            Voltar para a Loja
        </a>
    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    renderizarCarrinho();
});

function renderizarCarrinho() {
    let carrinho = JSON.parse(localStorage.getItem('farmaon_carrinho')) || [];
    
    let containerTabela = document.getElementById('container-tabela-carrinho');
    let containerBotoes = document.getElementById('container-botoes');
    let containerVazio = document.getElementById('container-vazio');
    let tbody = document.getElementById('corpo-tabela-carrinho');

    // Se estiver vazio, mostra a mensagem e esconde a tabela
    if (carrinho.length === 0) {
        containerTabela.style.display = 'none';
        containerBotoes.style.display = 'none';
        containerVazio.style.display = 'block';
        return;
    }

    // Se tiver itens, mostra a tabela e esconde a mensagem
    containerTabela.style.display = 'block';
    containerBotoes.style.display = 'flex';
    containerVazio.style.display = 'none';

    // Limpa a tabela antes de desenhar
    tbody.innerHTML = '';

    carrinho.forEach((produto) => {
        let subtotal = produto.valor * produto.quantidade;
        
        let tr = document.createElement('tr');
        tr.style.borderBottom = '1px solid #eeeeee';
        
        // Manteve-se o seu design original aqui
        tr.innerHTML = `
            <td style="padding: 15px; text-align: center; font-weight: bold; color: #444;">${produto.nome}</td>
            <td style="padding: 15px; text-align: center; color: #666;">${formatarMoeda(produto.valor)}</td>
            <td style="padding: 15px; text-align: center;">
                <button onclick="alterarQtd(${produto.id}, -1)" style="border:none; background:transparent; font-weight:bold; cursor:pointer; font-size:1.2rem; color:#1e3a8a;">-</button>
                <span style="background-color: #f0f4ff; color: #1e3a8a; padding: 6px 16px; border-radius: 20px; font-weight: bold; border: 1px solid #cce0ff; margin: 0 10px;">
                    ${produto.quantidade}
                </span>
                <button onclick="alterarQtd(${produto.id}, 1)" style="border:none; background:transparent; font-weight:bold; cursor:pointer; font-size:1.2rem; color:#1e3a8a;">+</button>
            </td>
            <td style="padding: 15px; text-align: center; color: #28a745; font-weight: bold; font-size: 1.1rem;">
                ${formatarMoeda(subtotal)}
            </td>
            <td style="padding: 15px; text-align: center;">
                <button onclick="removerItem(${produto.id})" style="border:none; background:#dc3545; color:white; padding:5px 10px; border-radius:5px; cursor:pointer;">X</button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

function alterarQtd(id, delta) {
    let carrinho = JSON.parse(localStorage.getItem('farmaon_carrinho')) || [];
    let produto = carrinho.find(item => item.id === id);

    if (produto) {
        produto.quantidade += delta;
        if (produto.quantidade <= 0) {
            removerItem(id);
            return;
        }
        localStorage.setItem('farmaon_carrinho', JSON.stringify(carrinho));
        renderizarCarrinho();
    }
}

function removerItem(id) {
    let carrinho = JSON.parse(localStorage.getItem('farmaon_carrinho')) || [];
    carrinho = carrinho.filter(item => item.id !== id);
    localStorage.setItem('farmaon_carrinho', JSON.stringify(carrinho));
    renderizarCarrinho();
}

function limparCarrinho() {
    if(confirm("Tem certeza que deseja esvaziar o carrinho?")) {
        localStorage.removeItem('farmaon_carrinho');
        renderizarCarrinho();
    }
}

function prepararCheckout() {
    let carrinho = localStorage.getItem('farmaon_carrinho');
    let carrinhoArray = JSON.parse(carrinho) || [];

    if (carrinhoArray.length === 0) {
        alert("Carrinho vazio!");
        return;
    }

    document.getElementById('carrinho_dados').value = carrinho;
    document.getElementById('form-checkout').submit();
}

function formatarMoeda(valor) {
    return valor.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
}
</script>
@endsection