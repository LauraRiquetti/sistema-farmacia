<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PedidoConfirmado extends Mailable
{
    use Queueable, SerializesModels;

    // Variáveis que vão guardar os dados do pedido e o valor total
    public $venda;
    public $totalPedido;

    // Recebe a venda e o total quando o e-mail for disparado
    public function __construct($venda, $totalPedido)
    {
        $this->venda = $venda;
        $this->totalPedido = $totalPedido;
    }

    // Constrói o e-mail: define o Assunto e a Tela (View)
    public function build()
    {
        return $this->subject('Seu Pedido foi Confirmado! - FarmaOn')
                    ->view('emails.pedido_confirmado');
    }
}