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
Route::resource('clientes', 'clientesController');

Route::resource('compras', 'comprasController');
Route::get('/itenscompras/{id}/adicionar', 'ItensComprasController@adicionar')->name('itenscompras.adicionar');
Route::resource('itenscompras', 'itensComprasController');
Route::resource('pagamentos', 'pagamentosController');
Route::get('/pagamentos/{id}/adicionar', 'PagamentosController@adicionar')->name('pagamentos.adicionar');

Route::resource('vendas', 'vendasController');
Route::get('/vendas/{id}/cancelar', 'VendasController@cancelar')->name('vendas.cancelar');
Route::get('/itensvendas/{id}/adicionar', 'ItensVendasController@adicionar')->name('itensvendas.adicionar');
Route::resource('itensvendas', 'itensVendasController');
Route::resource('recebimentos', 'recebimentosController');
Route::get('/recebimentos/{id}/adicionar', 'RecebimentosController@adicionar')->name('recebimentos.adicionar');

Route::group(['prefix' => '/relfuncionarios'], function () {
    Route::get('/', 'RelFuncionariosController@index')->name('relfuncionarios.index');
    Route::get('/geral','RelFuncionariosController@geral')->name('relfuncionarios.geral');
    Route::post('/cargo','RelFuncionariosController@cargo')->name('relfuncionarios.cargo');
});
