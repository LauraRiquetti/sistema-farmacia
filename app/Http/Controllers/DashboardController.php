<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Produto;
use App\Models\Venda; // Importe o model de Venda se ele existir

class DashboardController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::count();
        $produtos = Produto::count();
        
        $vendas = class_exists('\App\Models\Venda') ? Venda::count() : 0;

        return view('admin.dashboard', compact('usuarios', 'produtos', 'vendas'));
    }
}