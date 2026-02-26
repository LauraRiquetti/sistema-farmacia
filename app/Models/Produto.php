<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'quantidade',
        'valor',
        'descricao',
    ];

    protected function venda()
    {
        return $this->hasMany(Venda::class);
    }
}
