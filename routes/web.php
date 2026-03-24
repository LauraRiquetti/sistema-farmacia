<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarrinhoController;

/*
|--------------------------------------------------------------------------
| ROTAS PÚBLICAS (Loja, Carrinho e Autenticação)
|--------------------------------------------------------------------------
*/

// Home da Loja
Route::get('/', [HomeController::class, 'index'])->name('loja.home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/loja', function () { return view('loja.index'); });

// Catálogo de Produtos
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');

// Carrinho de Compras
Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho');
Route::get('/carrinho/adicionar/{id}', [CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');
Route::get('/carrinho/limpar', [CarrinhoController::class, 'limpar'])->name('carrinho.limpar');

// Autenticação (Login e Cadastro)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // ROTA ADICIONADA!

Route::get('/cadastro', function () { return view('auth.cadastro'); })->name('cadastro');
Route::post('/cadastro', [UsuarioController::class, 'store']);

// Utilidades
Route::get('/cep/{cep}', [UsuarioController::class, 'buscarCep']);


/*
|--------------------------------------------------------------------------
| ROTAS PROTEGIDAS PARA CLIENTES LOGADOS
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/checkout', function () {
        return "Página de Finalização de Compra! Se você está lendo isso, é porque conseguiu fazer o Login com sucesso e o fluxo funcionou.";
    })->name('checkout');

    // 👉 AQUI ESTÁ A CORREÇÃO: Qualquer cliente logado pode salvar uma venda agora!
    Route::post('/vendas', [VendaController::class, 'store'])->name('vendas.store');
});


/*
|--------------------------------------------------------------------------
| ROTAS ADMINISTRATIVAS (Protegidas por Login e Nível Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {
    
    // Dashboard principal do Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin', function () { return view('admin'); })->name('admin.index');

    // CRUD de Produtos
    Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/produtos/salvar', [ProdutoController::class, 'store'])->name('produtos.store');

    // CRUD de Usuários
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
    Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');

    // CRUD de Vendas
    Route::get('/vendas', [VendaController::class, 'index'])->name('vendas.index');
    Route::get('/vendas/create', [VendaController::class, 'create'])->name('vendas.create');
    
    // (A rota de POST para /vendas foi movida daqui para o grupo de cima)
    
    Route::get('/vendas/{id}', [VendaController::class, 'show'])->name('vendas.show');
    Route::get('/vendas/{id}/edit', [VendaController::class, 'edit'])->name('vendas.edit');
    Route::put('/vendas/{id}', [VendaController::class, 'update'])->name('vendas.update');

});