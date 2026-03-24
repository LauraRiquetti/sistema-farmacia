<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto; 

class HomeController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        // Definimos 'todos' para que na home a gente saiba que não há um filtro específico aplicado
        $categoria = 'todos'; 
        return view('loja.home', compact('produtos', 'categoria'));
    }
}