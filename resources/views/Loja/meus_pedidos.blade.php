@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 40px; margin-bottom: 60px;">
    <h2 style="color: #1e3a8a; font-weight: bold; text-align: center; margin-bottom: 30px;">📦 Meus Pedidos</h2>

    @if($pedidos->isEmpty())
        <div style="text-align: center; padding: 60px 20px; background-color: #f8f9fa; border-radius: 12px; border: 1px dashed #ced4da; margin-top: 20px;">
            <h4 style="color: #6c757d; margin-bottom: 25px; font-size: 1.5rem;">Você ainda não fez nenhum pedido! 😔</h4>
            <a href="{{ route('loja.home') }}" 
               style="display: inline-block; background-color: #1e3a8a; color: #ffffff; text-decoration: none; padding: 14px 30px; border-radius: 8px; font-weight: bold; font-size: 1.1rem; transition: 0.3s; box-shadow: 0 4px 10px rgba(30, 58, 138, 0.3);"
               onmouseover="this.style.backgroundColor='#152a61';"
               onmouseout="this.style.backgroundColor='#1e3a8a';">
                Começar a Comprar
            </a>
        </div>
    @else
        <div style="background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); overflow: hidden;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead style="background-color: #1e3a8a; color: white;">
                    <tr>
                        <th style="padding: 15px; text-align: center; font-size: 1.1rem;">Nº do Pedido</th>
                        <th style="padding: 15px; text-align: center; font-size: 1.1rem;">Produto</th>
                        <th style="padding: 15px; text-align: center; font-size: 1.1rem;">Detalhes</th>
                        <th style="padding: 15px; text-align: center; font-size: 1.1rem;">Valor Total</th>
                        <th style="padding: 15px; text-align: center; font-size: 1.1rem;">Status</th>
                        <th style="padding: 15px; text-align: center; font-size: 1.1rem;">Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)
                        <tr style="border-bottom: 1px solid #eeeeee;">
                            <td style="padding: 15px; text-align: center; font-weight: bold; color: #444;">
                                #{{ str_pad($pedido->id, 5, '0', STR_PAD_LEFT) }}
                            </td>
                            <td style="padding: 15px; text-align: center; font-weight: bold; color: #1e3a8a;">
                                {{ $pedido->produto->nome ?? 'Produto não encontrado' }}
                            </td>
                            <td style="padding: 15px; text-align: center; color: #666;">
                                {{ $pedido->descricao }}
                            </td>
                            <td style="padding: 15px; text-align: center; color: #28a745; font-weight: bold; font-size: 1.1rem;">
                                R$ {{ number_format($pedido->valor, 2, ',', '.') }}
                            </td>
                            <td style="padding: 15px; text-align: center;">
                                @if($pedido->status == 'aguardando_confirmacao')
                                    <span style="background-color: #fff3cd; color: #856404; padding: 6px 12px; border-radius: 20px; font-weight: bold; font-size: 0.9rem;">Aguardando</span>
                                @elseif($pedido->status == 'separando')
                                    <span style="background-color: #cce5ff; color: #004085; padding: 6px 12px; border-radius: 20px; font-weight: bold; font-size: 0.9rem;">Separando</span>
                                @elseif($pedido->status == 'saiu_para_entrega')
                                    <span style="background-color: #d4edda; color: #155724; padding: 6px 12px; border-radius: 20px; font-weight: bold; font-size: 0.9rem;">Em Rota</span>
                                @elseif($pedido->status == 'entregue')
                                    <span style="background-color: #d1ecf1; color: #0c5460; padding: 6px 12px; border-radius: 20px; font-weight: bold; font-size: 0.9rem;">Entregue</span>
                                @else
                                    <span style="background-color: #e2e3e5; color: #383d41; padding: 6px 12px; border-radius: 20px; font-weight: bold; font-size: 0.9rem;">{{ ucfirst(str_replace('_', ' ', $pedido->status)) }}</span>
                                @endif
                            </td>
                            <td style="padding: 15px; text-align: center; color: #888;">
                                {{ $pedido->created_at->format('d/m/Y H:i') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection