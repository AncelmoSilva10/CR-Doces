<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

// Rota para exibir o formulário de criação de pedido
Route::get('/pedido', [PedidoController::class, 'create'])->name('pedido.create');

// Rota para salvar o pedido
Route::post('/pedido', [PedidoController::class, 'store'])->name('pedido.store');

// Outras rotas para CRUD, se necessário
Route::get('/lista', [PedidoController::class, 'index'])->name('pedido.index');
Route::get('/pedido/{id}/edit', [PedidoController::class, 'edit'])->name('pedido.edit');
Route::put('/pedido/{id}', [PedidoController::class, 'update'])->name('pedido.update');
Route::delete('/pedido/{id}', [PedidoController::class, 'destroy'])->name('pedido.destroy');
