<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {return view('welcome');});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::prefix('/app')->group(function(){
    Route::get('/produtos', [App\Http\Controllers\ProdutoController::class, 'index'])->name('produtos');
    Route::get('/produtos/novo', [App\Http\Controllers\ProdutoController::class, 'create'])->name('produtos.create');

   
    Route::post('/produtos', [App\Http\Controllers\ProdutoController::class, 'store'])->name('produtos.store');
    Route::get('/produtos/editar/{id}', [App\Http\Controllers\ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::put('/produtos/update/{id}', [App\Http\Controllers\ProdutoController::class, 'update'])->name('produtos.update');
    Route::get('/produtos/deletar/{id}', [App\Http\Controllers\ProdutoController::class, 'destroy'])->name('produtos.destroy');
});

// Route::get('/produtos', [App\Http\Controllers\ProdutoController::class, 'index'])->name('produtos');
// Route::get('/produtos/novo', [App\Http\Controllers\ProdutoController::class, 'create'])->name('produtos.create');