<?php

use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(LogAcessoMiddleware::class);


Auth::routes();

Route::prefix('/app')->group(function () {

    Route::get('/produtos', [App\Http\Controllers\ProdutoController::class, 'index'])->name('produtos');
    Route::get('/produtos/novo', [App\Http\Controllers\ProdutoController::class, 'create'])->name('produtos.create');


    Route::post('/produtos', [App\Http\Controllers\ProdutoController::class, 'store'])->name('produtos.store');
    Route::get('/produtos/editar/{id}', [App\Http\Controllers\ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::put('/produtos/editar/{id}', [App\Http\Controllers\ProdutoController::class, 'update'])->name('produtos.update');
    Route::get('/produtos/apagar/{id}', [App\Http\Controllers\ProdutoController::class, 'destroy'])->name('produtos.destroy');
    Route::get('/lista-fornecedor', 'App\Http\Controllers\ListaFornecedorController@index');

    Route::get('/diretor', [App\Http\Controllers\DiretorController::class, 'index'])->name('app.diretor');
    Route::get('/fornecedor', [App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');
});

// Route::get('/produtos', [App\Http\Controllers\ProdutoController::class, 'index'])->name('produtos');
// Route::get('/produtos/novo', [App\Http\Controllers\ProdutoController::class, 'create'])->name('produtos.create');