<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Usuario extends Model
{
    use HasFactory;

   

    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'data_nascimento',
        'CEP',
        'rua',
        'bairro',
        'cidade',
        'estado',
        'numero'
    ];

    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }
}
