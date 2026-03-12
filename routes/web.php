<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

//Rotas de produtos
Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/produtos/create', [ProdutoController::class, 'create']);
Route::post('/produtos', [ProdutoController::class, 'store']);

//Rotas de usuários
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');

//Rotas de vendas
Route::get('/vendas', [VendaController::class, 'index'])->name('vendas.index');
Route::get('/vendas/create', [VendaController::class, 'create'])->name('vendas.create');
Route::post('/vendas', [VendaController::class, 'store'])->name('vendas.store');
Route::get('/vendas/{id}', [VendaController::class, 'show'])->name('vendas.show');
Route::get('/vendas/{id}/edit', [VendaController::class, 'edit'])->name('vendas.edit');
Route::put('/vendas/{id}', [VendaController::class, 'update'])->name('vendas.update');


Route::get('/', [HomeController::class, 'index'])->name('loja.home');
Route::get('/home', [HomeController::class, 'index'])->name('loja.home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/cadastro', function () {
    return view('auth.cadastro');
})->name('cadastro');
Route::post('/cadastro', [UsuarioController::class, 'store']);

Route::get('/loja', function () {
    return view('loja.index');
});

Route::get('/cep/{cep}', [UsuarioController::class, 'buscarCep']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth','admin']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    });
});

//Rotas de Carrinhos
use App\Http\Controllers\CarrinhoController;

Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho');

Route::get('/carrinho/adicionar/{id}', [CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');
