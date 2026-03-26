@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- Removi o H2 que ficava aqui para o visual ficar mais limpo --}}

        {{-- Banner Principal - Agora é o destaque número 1 --}}
        @if($categoria === 'todos')
            <div class="banner-promocao mb-5" style="
                background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); 
                border-radius: 15px; 
                padding: 60px 20px; 
                text-align: center; 
                color: white; 
                box-shadow: 0 4px 20px rgba(30, 58, 138, 0.2);
                margin-top: 20px;
            ">
                <h1 style="font-weight: 900; font-size: 3.5rem; margin-bottom: 10px;  letter-spacing: 2px;">
                    FarmaON
                </h1>
                <p style="font-size: 1.4rem; opacity: 0.9; font-weight: 300; margin-bottom: 25px;">
                    Sua saúde em boas mãos. Aproveite nossas ofertas exclusivas!
                </p>
                <div style="display: inline-block; background: #fbbf24; color: #1e3a8a; padding: 12px 35px; border-radius: 50px; font-weight: bold; font-size: 1.2rem; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                    CONFIRA OS PRODUTOS ↓
                </div>
            </div>
        @else
            {{-- Se não for "todos", mostra apenas o nome do departamento de forma elegante --}}
            <h2 class="my-5" style="color: #1e3a8a; font-weight: bold; text-align: center; text-transform: uppercase; letter-spacing: 1px;">
                Departamento: {{ ucfirst($categoria) }}
            </h2>
        @endif

        {{-- Filtros de Categorias --}}
        <div class="categorias mb-5 text-center">
            <a href="{{ route('categoria.show', 'farmacia') }}" class="btn {{ isset($categoria) && $categoria === 'farmacia' ? 'btn-primary active' : 'btn-outline-primary' }}">Farmácia</a>
            <a href="{{ route('categoria.show', 'vitaminas') }}" class="btn {{ isset($categoria) && $categoria === 'vitaminas' ? 'btn-primary active' : 'btn-outline-primary' }}">Vitaminas</a>
            <a href="{{ route('categoria.show', 'beleza') }}" class="btn {{ isset($categoria) && $categoria === 'beleza' ? 'btn-primary active' : 'btn-outline-primary' }}">Beleza</a>
            <a href="{{ route('categoria.show', 'infantil') }}" class="btn {{ isset($categoria) && $categoria === 'infantil' ? 'btn-primary active' : 'btn-outline-primary' }}">Infantil</a>
            <a href="{{ route('categoria.show', 'pet') }}" class="btn {{ isset($categoria) && $categoria === 'pet' ? 'btn-primary active' : 'btn-outline-primary' }}">Pet</a>
        </div>

        {{-- Listagem de Produtos --}}
        <div class="produtos">
            @if($produtos->isEmpty())
                <div class="alert alert-info w-100 text-center">Nenhum produto encontrado neste departamento.</div>
            @else
                @foreach ($produtos as $produto)
                    <div class="produto shadow-sm">
                        <div class="img-container">
                            @if($produto->imagem)
                                <img src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}" loading="lazy">
                            @else
                                <div style="width: 100%; height: 100%; background: #f8fafc; display: flex; align-items: center; justify-content: center; color: #64748b; font-weight: bold; padding: 15px; text-align: center; font-size: 0.8rem;">
                                    {{ $produto->nome }}
                                </div>
                            @endif
                        </div>
                        <div class="info">
                            <h4>{{ $produto->nome }}</h4>
                            <span class="badge-cat">{{ ucfirst($produto->categoria) }}</span>
                            <p class="preco">R$ {{ number_format($produto->valor, 2, ',', '.') }}</p>
                            
                            <button type="button" class="botao" onclick="adicionarAoCache({{ $produto->id }}, '{{ addslashes($produto->nome) }}', {{ $produto->valor }})">
                                Adicionar ao Carrinho
                            </button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <style>
            .produtos { display: flex; flex-wrap: wrap; gap: 25px; justify-content: center; padding-bottom: 60px; }
            .produto { width: 230px; background: white; border-radius: 15px; overflow: hidden; transition: 0.3s ease; display: flex; flex-direction: column; border: 1px solid #f1f5f9; }
            .produto:hover { transform: translateY(-8px); box-shadow: 0 12px 20px rgba(0,0,0,0.08) !important; }
            .img-container { width: 100%; height: 180px; background: #fff; display: flex; align-items: center; justify-content: center; }
            .produto img { max-width: 90%; max-height: 90%; object-fit: contain; }
            .info { padding: 20px; text-align: center; }
            .info h4 { font-size: 0.95rem; margin-bottom: 8px; height: 2.4rem; overflow: hidden; color: #1e293b; font-weight: 600; }
            .badge-cat { font-size: 0.7rem; background: #e0e7ff; color: #4338ca; padding: 3px 10px; border-radius: 20px; font-weight: bold; text-transform: uppercase; }
            .preco { font-size: 1.3rem; font-weight: 800; color: #15803d; margin: 12px 0; }
            .botao { background: #1e3a8a; color: white; border: none; padding: 12px; width: 100%; border-radius: 8px; cursor: pointer; font-weight: bold; transition: background 0.3s; }
            .botao:hover { background: #1e40af; }
            .categorias .btn { margin: 5px; border-radius: 30px; padding: 8px 20px; font-weight: 600; }
        </style>

        <script>
            function adicionarAoCache(id, nome, valor) {
                let carrinho = JSON.parse(localStorage.getItem('farmaon_carrinho')) || [];
                let produtoExistente = carrinho.find(item => item.id === id);

                if (produtoExistente) {
                    produtoExistente.quantidade += 1;
                } else {
                    carrinho.push({ id: id, nome: nome, valor: parseFloat(valor), quantidade: 1 });
                }

                localStorage.setItem('farmaon_carrinho', JSON.stringify(carrinho));
                alert(nome + " foi adicionado ao carrinho!");
            }
        </script>
    </div>
@endsection