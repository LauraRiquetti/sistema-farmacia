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
        'user_id',
        'nome',
        'email',
        'password',
        'data_nascimento',
        'CEP',
        'rua',
        'bairro',
        'cidade',
        'estado',
        'numero'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }
}
