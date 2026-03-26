<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        $produtos = [
            // FARMÁCIA
            ["Dipirona 500mg", "farmacia", "produtos/dipirona-500mg.jpeg"],
            ["Paracetamol 750mg", "farmacia", "produtos/paracetamol-750mg.png"],
            ["Ibuprofeno 600mg", "farmacia", "produtos/ibuprofeno-600mg.png"],
            ["Amoxicilina", "farmacia", "produtos/amoxicilina.jpeg"],
            ["Loratadina", "farmacia", "produtos/loratadina.jpeg"],
            ["Omeprazol", "farmacia", "produtos/omeprazol.jpeg"],
            ["Dramin B6", "farmacia", "produtos/dramin-b6.jpeg"],
            ["Buscopan", "farmacia", "produtos/buscopan.jpg"],

            // VITAMINAS
            ["Vitamina C", "vitaminas", "produtos/vitamina-c.jpeg"],
            ["Vitamina D3", "vitaminas", "produtos/vitamina-d3.jpg"],
            ["Complexo B", "vitaminas", "produtos/complexo-b.jpg"],
            ["Ômega 3", "vitaminas", "produtos/omega-3.jpg"],
            ["Magnésio", "vitaminas", "produtos/magnesio.jpeg"],
            ["Colágeno", "vitaminas", "produtos/colageno.jpg"],
            ["Zinco", "vitaminas", "produtos/zincojpg.jpg"],
            ["Multivitamínico", "vitaminas", "produtos/multivitaminico.jpeg"],

            // BELEZA
            ["Shampoo Antiqueda", "beleza", "produtos/shampoo-antiqueda.png"],
            ["Sérum Facial", "beleza", "produtos/serum-facial.jpeg"],
            ["Protetor Solar", "beleza", "produtos/protetor-solar.png"],
            ["Máscara Capilar", "beleza", "produtos/mascara-capilar.jpg"],
            ["Sabonete Facial", "beleza", "produtos/sabonete-facial.jpeg"],
            ["Hidratante Corp", "beleza", "produtos/hidratante-corp.jpg"],
            ["Água Micelar", "beleza", "produtos/agua-micelar.png"],
            ["Gel de Limpeza", "beleza", "produtos/gel-de-limpeza.jpeg"],

            // INFANTIL
            ["Fralda G", "infantil", "produtos/fralda-g.jpeg"],
            ["Lenço Umedecido", "infantil", "produtos/lenco-umedecido.jpg"],
            ["Pomada Assadura", "infantil", "produtos/pomada-assadura.jpg"],
            ["Shampoo Bebê", "infantil", "produtos/shampoo-bebe.jpg"],
            ["Leite Fórmula", "infantil", "produtos/leite-formula.jpeg"],
            ["Termômetro", "infantil", "produtos/termometro.jpg"],
            ["Sabonete Bebê", "infantil", "produtos/sabonete-bebe.jpg"],
            ["Chupeta", "infantil", "produtos/chupeta.jpg"],

            // PET
            ["Ração Cães", "pet", "produtos/racao-caes.jpg"],
            ["Antipulgas", "pet", "produtos/antipulgas.jpg"],
            ["Shampoo Pet", "pet", "produtos/shampoo-pet.jpeg"],
            ["Petisco Canino", "pet", "produtos/petisco-canino.jpeg"],
            ["Areia Gatos", "pet", "produtos/areia-gatos.jpeg"],
            ["Vermífugo Pet", "pet", "produtos/vermifugo-pet.jpeg"],
            ["Coleira", "pet", "produtos/coleira.jpeg"],
            ["Tapete Higiênico", "pet", "produtos/tapete-higienico.jpeg"],
        ];

        foreach ($produtos as $p) {
            Produto::create([
                'nome' => $p[0],
                'categoria' => $p[1],
                'imagem' => $p[2],
                'quantidade' => 50, // Estoque padrão
                'valor' => rand(15, 95) + 0.90, // Gera o preço
            ]);
        }
    }
}