<?php
namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::updateOrCreate(
            ['email' => 'admin@farmaon.com.br'],
            [
                'nome'            => 'Administrador Chefe',
                'password'        => Hash::make('12345678'),
                'role'            => 'admin',
                'data_nascimento' => '1990-01-01',
                'CEP'             => 12345678,    // Apenas números
                'rua'             => 'Rua do Admin',
                'bairro'          => 'Centro',
                'cidade'          => 'Cidade Exemplo',
                'estado'          => 'SP',
                'numero'          => 100,         // Apenas números
            ]
        );
    }
}