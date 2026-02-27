<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $table = 'vendas';

    protected $fillable = [
        'valor',
        'pagamento',
        'status',
        'descricao',
    ];

    public function usuarios()
    {
        return $this->belongTo(Usuario::class);
    }

    public function produto()
    {
        return $this->belongTo(Produto::class);
    }
    
}
