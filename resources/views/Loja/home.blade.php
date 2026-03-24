@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4" style="color: #1e3a8a; font-weight: bold; text-align: center;">
            {{ $categoria === 'todos' ? 'FarmaOn' : 'Departamento: ' . ucfirst($categoria) }}
        </h2>

        @if($categoria === 'todos')
            <div class="banner mb-4">
                <img id="bannerImg" src="https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?auto=format&fit=crop&w=1200&q=80" width="100%" height="280" style="object-fit:cover; border-radius:15px; transition: opacity 0.5s; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
            </div>
        @endif

        <div class="categorias mb-4 text-center">
            <a href="{{ route('categoria.show', 'farmacia') }}" class="btn {{ isset($categoria) && $categoria === 'farmacia' ? 'btn-primary active' : 'btn-outline-primary' }}">Farmácia</a>
            <a href="{{ route('categoria.show', 'vitaminas') }}" class="btn {{ isset($categoria) && $categoria === 'vitaminas' ? 'btn-primary active' : 'btn-outline-primary' }}">Vitaminas</a>
            <a href="{{ route('categoria.show', 'beleza') }}" class="btn {{ isset($categoria) && $categoria === 'beleza' ? 'btn-primary active' : 'btn-outline-primary' }}">Beleza</a>
            <a href="{{ route('categoria.show', 'infantil') }}" class="btn {{ isset($categoria) && $categoria === 'infantil' ? 'btn-primary active' : 'btn-outline-primary' }}">Infantil</a>
            <a href="{{ route('categoria.show', 'pet') }}" class="btn {{ isset($categoria) && $categoria === 'pet' ? 'btn-primary active' : 'btn-outline-primary' }}">Pet</a>
        </div>

        <div class="produtos">
            {{-- Verifica se a categoria tem produtos --}}
            @if($produtos->isEmpty())
                <div class="alert alert-info w-100 text-center">Nenhum produto encontrado neste departamento.</div>
            @else
                @foreach ($produtos as $produto)
                    <div class="produto shadow-sm">
                        <div class="img-container">
                            <img src="{{ $produto->imagem ?? 'https://placehold.co/400x400/1e3a8a/white?text=' . urlencode($produto->nome) }}" 
                                 alt="{{ $produto->nome }}" 
                                 loading="lazy">
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
            .produtos { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; padding: 20px 0 50px; }
            .produto { width: 220px; background: white; border-radius: 12px; overflow: hidden; transition: 0.3s; display: flex; flex-direction: column; border: 1px solid #eee; }
            .produto:hover { transform: translateY(-5px); box-shadow: 0 8px 15px rgba(0,0,0,0.1) !important; }
            .img-container { width: 100%; height: 160px; background: #fff; display: flex; align-items: center; justify-content: center; }
            .produto img { max-width: 100%; max-height: 100%; object-fit: contain; padding: 10px; }
            .info { padding: 15px; text-align: center; }
            .info h4 { font-size: 0.9rem; margin-bottom: 5px; height: 2.2rem; overflow: hidden; color: #333; }
            .badge-cat { font-size: 0.65rem; background: #f0f4ff; color: #1e3a8a; padding: 2px 8px; border-radius: 10px; font-weight: bold; text-transform: uppercase; }
            .preco { font-size: 1.2rem; font-weight: bold; color: #2e7d32; margin: 10px 0; }
            .botao { background: #1e3a8a; color: white; border: none; padding: 10px; width: 100%; border-radius: 6px; cursor: pointer; font-weight: bold; }
            .botao:hover { background: #152a61; }
            .categorias .btn { margin: 5px; border-radius: 20px; }
        </style>

        <script>
            // Troca de banner (só vai rodar se o banner existir na tela)
            const bannerElement = document.getElementById("bannerImg");
            if(bannerElement) {
                const banners = [
                    "https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?auto=format&fit=crop&w=1200&q=80",
                    "https://images.unsplash.com/photo-1587854692152-cbe660dbde88?auto=format&fit=crop&w=1200&q=80",
                    "https://images.unsplash.com/photo-1585435557343-3b092031a831?auto=format&fit=crop&w=1200&q=80"
                ];
                let i = 0;
                setInterval(() => {
                    i = (i + 1) % banners.length;
                    bannerElement.style.opacity = 0;
                    setTimeout(() => { bannerElement.src = banners[i]; bannerElement.style.opacity = 1; }, 500);
                }, 5000);
            }

            // FUNÇÃO MÁGICA DO CARRINHO (LocalStorage)
            function adicionarAoCache(id, nome, valor) {
                let carrinho = JSON.parse(localStorage.getItem('farmaon_carrinho')) || [];
                let produtoExistente = carrinho.find(item => item.id === id);

                if (produtoExistente) {
                    produtoExistente.quantidade += 1;
                } else {
                    carrinho.push({
                        id: id,
                        nome: nome,
                        valor: parseFloat(valor), 
                        quantidade: 1
                    });
                }

                localStorage.setItem('farmaon_carrinho', JSON.stringify(carrinho));
                
                // Exibe o alerta sem recarregar a página
                alert(nome + " foi adicionado ao carrinho!");
            }
        </script>
    </div>

    @if(session('compra_sucesso'))
            <script>
                // Limpa o carrinho do navegador
                localStorage.removeItem('farmaon_carrinho');
                // Avisa o cliente
                alert("{{ session('compra_sucesso') }}");
            </script>
        @endif
@endsection