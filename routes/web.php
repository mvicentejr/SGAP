<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('funcionarios', 'funcionariosController');
Route::resource('clientesf', 'clientesfController');
Route::resource('clientesj', 'clientesjController');
Route::resource('fornecedores', 'fornecedoresController');
Route::resource('produtos', 'produtosController');

Route::resource('estoque', 'estoqueController');
Route::resource('compras', 'comprasController');
Route::resource('itenscompras', 'itensComprasController');
Route::resource('pagamentos', 'pagamentosController');
