<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Usuario extends Model
{
    use HasFactory;

    protected function endereco(): Attribute
    {
        return Attribute::make(
            // O segundo argumento $attributes traz os outros campos
            get: fn (mixed $value, array $attributes) => 
                "{$attributes['estado']} {$attributes['cidade']} {$attributes['bairro']} {$attributes['rua']} {$attributes['numero']}",
        );
    }

    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'data_nascimento',
        'endereco',
    ];
}
