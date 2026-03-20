@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 40px; margin-bottom: 60px;">
    <h2 style="color: #1e3a8a; font-weight: bold; text-align: center; margin-bottom: 30px;">🛒 Meu Carrinho</h2>

    @if(count($carrinho) > 0)
        <div style="background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); overflow: hidden;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead style="background-color: #1e3a8a; color: white;">
                    <tr>
                        <th style="padding: 15px; text-align: center; font-size: 1.1rem;">Produto</th>
                        <th style="padding: 15px; text-align: center; font-size: 1.1rem;">Preço Unitário</th>
                        <th style="padding: 15px; text-align: center; font-size: 1.1rem;">Quantidade</th>
                        <th style="padding: 15px; text-align: center; font-size: 1.1rem;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carrinho as $id => $item)
                    <tr style="border-bottom: 1px solid #eeeeee;">
                        <td style="padding: 15px; text-align: center; font-weight: bold; color: #444;">{{ $item['nome'] }}</td>
                        <td style="padding: 15px; text-align: center; color: #666;">R$ {{ number_format($item['valor'], 2, ',', '.') }}</td>
                        <td style="padding: 15px; text-align: center;">
                            <span style="background-color: #f0f4ff; color: #1e3a8a; padding: 6px 16px; border-radius: 20px; font-weight: bold; border: 1px solid #cce0ff;">
                                {{ $item['quantidade'] }}
                            </span>
                        </td>
                        <td style="padding: 15px; text-align: center; color: #28a745; font-weight: bold; font-size: 1.1rem;">
                            R$ {{ number_format($item['valor'] * $item['quantidade'], 2, ',', '.') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px;">
            <a href="{{ route('carrinho.limpar') }}" 
               onclick="return confirm('Tem certeza que deseja esvaziar o carrinho?')"
               style="text-decoration: none; color: #dc3545; border: 2px solid #dc3545; padding: 12px 24px; border-radius: 8px; font-weight: bold; transition: 0.3s;"
               onmouseover="this.style.backgroundColor='#dc3545'; this.style.color='white';"
               onmouseout="this.style.backgroundColor='transparent'; this.style.color='#dc3545';">
                🗑️ Limpar Carrinho
            </a>

            <button style="background-color: #28a745; color: white; border: none; padding: 14px 35px; border-radius: 8px; font-weight: bold; font-size: 1.1rem; cursor: pointer; box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3); transition: 0.3s;"
                    onmouseover="this.style.backgroundColor='#218838'; this.style.transform='scale(1.05)';"
                    onmouseout="this.style.backgroundColor='#28a745'; this.style.transform='scale(1)';">
                ✅ Finalizar Compra
            </button>
        </div>

    @else
        <div style="text-align: center; padding: 60px 20px; background-color: #f8f9fa; border-radius: 12px; border: 1px dashed #ced4da; margin-top: 20px;">
            <h4 style="color: #6c757d; margin-bottom: 25px; font-size: 1.5rem;">Seu carrinho está vazio! 😔</h4>
            
            <a href="{{ route('loja.home') }}" 
               style="display: inline-block; background-color: #1e3a8a; color: #ffffff; text-decoration: none; padding: 14px 30px; border-radius: 8px; font-weight: bold; font-size: 1.1rem; transition: 0.3s; box-shadow: 0 4px 10px rgba(30, 58, 138, 0.3);"
               onmouseover="this.style.backgroundColor='#152a61';"
               onmouseout="this.style.backgroundColor='#1e3a8a';">
                Voltar para a Loja
            </a>
        </div>
    @endif

</div>
@endsection