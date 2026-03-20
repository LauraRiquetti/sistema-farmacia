@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 30px; margin-bottom: 80px;">
    
    <h2 style="color: #0b2a4a; font-weight: bold; text-align: center; margin-bottom: 30px;">
        💊 Nosso Catálogo Completo
    </h2>

    @if($produtos->count() > 0)
        <div class="produtos">
            
            @foreach($produtos as $produto)
            <div class="produto" style="box-shadow: 0 4px 8px rgba(0,0,0,0.1); transition: 0.3s;">
                
                <img src="https://via.placeholder.com/150?text={{ urlencode($produto->nome) }}" alt="{{ $produto->nome }}">
                
                <div style="margin-top: 15px;">
                    <p style="color: #444; font-weight: bold; margin-bottom: 5px; font-size: 14px;">
                        {{ $produto->nome }}
                    </p>
                    
                    <span style="font-size: 10px; color: #1e3a8a; background: #e0e7ff; padding: 3px 8px; border-radius: 10px; font-weight: bold;">
                        Estoque: {{ $produto->quantidade }}
                    </span>

                    <p class="preco" style="margin-top: 10px;">
                        R$ {{ number_format($produto->valor, 2, ',', '.') }}
                    </p>

                    <a href="{{ route('carrinho.adicionar', $produto->id) }}" 
                       class="botao text-decoration-none d-block text-center"
                       style="background-color: #1e3a8a; transition: 0.3s;"
                       onmouseover="this.style.backgroundColor='#152a61';"
                       onmouseout="this.style.backgroundColor='#1e3a8a';">
                        Adicionar
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    @else
        <div style="text-align: center; padding: 50px; background: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <h4 style="color: #666;">Nenhum produto cadastrado no momento. 😔</h4>
            <a href="{{ route('produtos.create') }}" class="btn btn-primary mt-3">Cadastrar Novo Produto</a>
        </div>
    @endif

</div>
@endsection