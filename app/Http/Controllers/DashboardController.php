<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Produto;

class DashboardController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::count();
        $produtos = Produto::count();

        return view('dashboard', compact('usuarios', 'produtos'));
    }
}