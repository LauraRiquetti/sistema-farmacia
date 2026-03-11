<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto; 

class HomeController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('home', compact('produtos'));
    }
}