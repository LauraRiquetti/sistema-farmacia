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
            @php
                $produtos = [
                    // FARMÁCIA
                    ["Dipirona 500mg", "farmacia", "https://plus.unsplash.com/premium_photo-1661766683107-5509930f711f?w=400"],
                    ["Paracetamol 750mg", "farmacia", "https://images.unsplash.com/photo-1576091160550-2173dad99978?w=400"],
                    ["Ibuprofeno 600mg", "farmacia", "https://images.unsplash.com/photo-1631549916768-4119b295f78b?w=400"],
                    ["Amoxicilina", "farmacia", "https://images.unsplash.com/photo-1607619056574-7b8d3ee536b2?w=400"],
                    ["Loratadina", "farmacia", "https://images.unsplash.com/photo-1628863030369-0268571bbfa6?w=400"],
                    ["Omeprazol", "farmacia", "https://images.unsplash.com/photo-1631549916781-8b2b9b7754f9?w=400"],
                    ["Dramin B6", "farmacia", "https://images.unsplash.com/photo-1550572017-ed200f545dec?w=400"],
                    ["Buscopan", "farmacia", "https://images.unsplash.com/photo-1471864190281-ad5f9f307b0d?w=400"],

                    // VITAMINAS
                    ["Vitamina C", "vitaminas", "https://images.unsplash.com/photo-1611071092200-a19234850550?w=400"],
                    ["Vitamina D3", "vitaminas", "https://images.unsplash.com/photo-1616670868351-a59079f4c0df?w=400"],
                    ["Complexo B", "vitaminas", "https://images.unsplash.com/photo-1559114210-90c74a0bbd5d?w=400"],
                    ["Ômega 3", "vitaminas", "https://images.unsplash.com/photo-1471194402529-8e0f5a675de6?w=400"],
                    ["Magnésio", "vitaminas", "https://images.unsplash.com/photo-1584017911766-d451b3d0e843?w=400"],
                    ["Colágeno", "vitaminas", "https://images.unsplash.com/photo-1626202346584-c7161e71f9f2?w=400"],
                    ["Zinco", "vitaminas", "https://images.unsplash.com/photo-1576671081837-49000212a370?w=400"],
                    ["Multivitamínico", "vitaminas", "https://images.unsplash.com/photo-1550572017-4f1b440a6dec?w=400"],

                    // BELEZA
                    ["Shampoo Antiqueda", "beleza", "https://images.unsplash.com/photo-1535585209827-a15fcdbc4c2d?w=400"],
                    ["Sérum Facial", "beleza", "https://images.unsplash.com/photo-1620916566398-39f1143f7c0e?w=400"],
                    ["Protetor Solar", "beleza", "https://images.unsplash.com/photo-1556228852-6d35a585d567?w=400"],
                    ["Máscara Capilar", "beleza", "https://images.unsplash.com/photo-1526947425960-945c6e72858f?w=400"],
                    ["Sabonete Facial", "beleza", "https://images.unsplash.com/photo-1556228720-195a672e8a03?w=400"],
                    ["Hidratante Corp", "beleza", "https://images.unsplash.com/photo-1512496015851-a90fb38ba796?w=400"],
                    ["Água Micelar", "beleza", "https://images.unsplash.com/photo-1599305090598-fe179d501c27?w=400"],
                    ["Gel de Limpeza", "beleza", "https://images.unsplash.com/photo-1556229162-5c63ed9c4ffb?w=400"],

                    // INFANTIL
                    ["Fralda G", "infantil", "https://images.unsplash.com/photo-1610484966606-d58e3767e716?w=400"],
                    ["Lenço Umedecido", "infantil", "https://images.unsplash.com/photo-1602152342939-550ff69f3d51?w=400"],
                    ["Pomada Assadura", "infantil", "https://images.unsplash.com/photo-1631248055158-edec7a3c072b?w=400"],
                    ["Shampoo Bebê", "infantil", "https://images.unsplash.com/photo-1519689689353-875c1bb3d17d?w=400"],
                    ["Leite Fórmula", "infantil", "https://images.unsplash.com/photo-1621643641830-4e5883715c61?w=400"],
                    ["Termômetro", "infantil", "https://images.unsplash.com/photo-1584036561566-baf2418ad144?w=400"],
                    ["Sabonete Bebê", "infantil", "https://images.unsplash.com/photo-1614806687431-43a098d6974b?w=400"],
                    ["Chupeta", "infantil", "https://images.unsplash.com/photo-1522771935876-249711cdbb67?w=400"],

                    // PET
                    ["Ração Cães", "pet", "https://images.unsplash.com/photo-1589924691106-0370d0246a48?w=400"],
                    ["Antipulgas", "pet", "https://images.unsplash.com/photo-1541781713-334a17621c0b?w=400"],
                    ["Shampoo Pet", "pet", "https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=400"],
                    ["Petisco Canino", "pet", "https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=400"],
                    ["Areia Gatos", "pet", "https://images.unsplash.com/photo-1591160607373-b3c96560ee1d?w=400"],
                    ["Vermífugo Pet", "pet", "https://images.unsplash.com/photo-1615671195655-3d89851758c9?w=400"],
                    ["Coleira", "pet", "https://images.unsplash.com/photo-1591946614421-1fbf121fca3c?w=400"],
                    ["Tapete Higiênico", "pet", "https://images.unsplash.com/photo-1583512676605-934d237d2dd3?w=400"],
                ];
            @endphp

            @foreach ($produtos as $index => $produto)
                <div class="produto shadow-sm" data-cat="{{ $produto[1] }}">
                    <div class="img-container">
                        <img src="{{ $produto[2] }}" 
                             alt="{{ $produto[0] }}" 
                             onerror="this.onerror=null;this.src='https://placehold.co/400x400/1e3a8a/white?text={{ urlencode($produto[0]) }}';"
                             loading="lazy">
                    </div>
                    <div class="info">
                        <h4>{{ $produto[0] }}</h4>
                        <span class="badge-cat">{{ ucfirst($produto[1]) }}</span>
                        <p class="preco">R$ {{ number_format(rand(15,95) + 0.90, 2, ',', '.') }}</p>
                        <a href="{{ route('carrinho.adicionar', ['id' => $index]) }}" style="text-decoration:none;">
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
    </div>
@endsection