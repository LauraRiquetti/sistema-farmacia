<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    // É ESTA LINHA AQUI QUE SALVA A NOSSA VIDA!
    // Ela diz ao Laravel quais colunas nós temos permissão para preencher pelo form/carrinho
    protected $fillable = [
        'usuario_id', 
        'produto_id', 
        'valor', 
        'pagamento', 
        'status', 
        'descricao'
    ];

    // Os seus relacionamentos (se já tiver) continuam aqui embaixo...
    public function usuario()
    {
        return $this->belongsTo(Usuario::class); // Ou User::class, dependendo do seu projeto
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}