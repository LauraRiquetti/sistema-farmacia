<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable // <--- MUDE DE Model PARA Authenticatable
{
    use HasFactory, Notifiable;

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
        'numero',
        'role' 
    ];

    protected $hidden = [
        'password',
        'remember_token',
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