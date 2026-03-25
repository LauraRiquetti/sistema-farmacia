<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { background-color: #ffffff; padding: 30px; border-radius: 8px; max-width: 600px; margin: 0 auto; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .header { background-color: #d40000; color: white; padding: 15px; text-align: center; border-radius: 8px 8px 0 0; font-size: 24px; font-weight: bold; }
        .content { padding: 20px; color: #333; line-height: 1.6; }
        .footer { text-align: center; padding-top: 20px; font-size: 12px; color: #777; border-top: 1px solid #ddd; margin-top: 20px;}
        .destaque { font-size: 18px; color: #d40000; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            FarmaOn
        </div>
        <div class="content">
            <h2>Olá, {{ auth()->user()->name }}!</h2>
            <p>Recebemos o seu pedido com sucesso. Muito obrigado por comprar na FarmaOn!</p>
            
            <p><strong>Número do Pedido:</strong> #{{ $venda->id ?? '0000' }}</p>
            
            <p><strong>Valor Total da Compra:</strong> <span class="destaque">R$ {{ number_format($totalPedido, 2, ',', '.') }}</span></p>
            <p>Sua encomenda já está sendo preparada e logo sairá para entrega.</p>
        </div>
        <div class="footer">
            Este é um e-mail automático. Por favor, não responda.<br>
            &copy; {{ date('Y') }} FarmaOn - Todos os direitos reservados.
        </div>
    </div>
</body>
</html>