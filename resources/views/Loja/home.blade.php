@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4" style="color: #1e3a8a; font-weight: bold; text-align: center;">FarmaOn</h2>

        <div class="banner mb-4">
            <img id="bannerImg" src="https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?auto=format&fit=crop&w=1200&q=80" width="100%" height="280" style="object-fit:cover; border-radius:15px; transition: opacity 0.5s; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        </div>

        <div class="categorias mb-4 text-center">
            <button class="btn btn-primary active" onclick="filtrar('todos', this)">Todos</button>
            <button class="btn btn-outline-primary" onclick="filtrar('farmacia', this)">Farmácia</button>
            <button class="btn btn-outline-primary" onclick="filtrar('vitaminas', this)">Vitaminas</button>
            <button class="btn btn-outline-primary" onclick="filtrar('beleza', this)">Beleza</button>
            <button class="btn btn-outline-primary" onclick="filtrar('infantil', this)">Infantil</button>
            <button class="btn btn-outline-primary" onclick="filtrar('pet', this)">Pet</button>
        </div>

        <div class="produtos">
            {{-- Puxando os produtos DIRETAMENTE DO BANCO DE DADOS! --}}
            @php
                $produtosBanco = \App\Models\Produto::all();
            @endphp

            @foreach ($produtosBanco as $produto)
                <div class="produto shadow-sm" data-cat="{{ $produto->categoria }}">
                    <div class="img-container">
                        <img src="{{ $produto->imagem ?? 'https://placehold.co/400x400/1e3a8a/white?text=' . urlencode($produto->nome) }}" 
                             alt="{{ $produto->nome }}" 
                             loading="lazy">
                    </div>
                    <div class="info">
                        <h4>{{ $produto->nome }}</h4>
                        <span class="badge-cat">{{ ucfirst($produto->categoria) }}</span>
                        <p class="preco">R$ {{ number_format($produto->valor, 2, ',', '.') }}</p>
                        
                        {{-- O botão agora envia o ID REAL do banco de dados --}}
                        <a href="{{ route('carrinho.adicionar', ['id' => $produto->id]) }}" style="text-decoration:none;">
                            <button class="botao">Adicionar</button>
                        </a>
                    </div>
                </div>
            @endforeach
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
            // Troca de banner
            const banners = [
                "https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?auto=format&fit=crop&w=1200&q=80",
                "https://images.unsplash.com/photo-1587854692152-cbe660dbde88?auto=format&fit=crop&w=1200&q=80",
                "https://images.unsplash.com/photo-1585435557343-3b092031a831?auto=format&fit=crop&w=1200&q=80"
            ];
            let i = 0;
            setInterval(() => {
                i = (i + 1) % banners.length;
                const b = document.getElementById("bannerImg");
                b.style.opacity = 0;
                setTimeout(() => { b.src = banners[i]; b.style.opacity = 1; }, 500);
            }, 5000);

            // Filtro
            function filtrar(cat, btn) {
                document.querySelectorAll('.categorias button').forEach(b => b.className = 'btn btn-outline-primary');
                btn.className = 'btn btn-primary active';
                document.querySelectorAll(".produto").forEach(p => {
                    p.style.display = (cat === "todos" || p.dataset.cat === cat) ? "flex" : "none";
                });
            }
        </script>

        @if(session('sucesso'))
            <script>
                // Dispara o alerta nativo do navegador
                alert("{{ session('sucesso') }}");
            </script>
        @endif

    </div>
@endsection