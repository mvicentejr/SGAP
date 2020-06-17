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
Route::group(['prefix' => '/relclientes'], function () {
    Route::get('/', 'RelClientesController@index')->name('relclientes.index');
    Route::get('/geral','RelClientesController@geral')->name('relclientes.geral');
    Route::post('/status','RelClientesController@status')->name('relclientes.status');
});
Route::group(['prefix' => '/relprodutos'], function () {
    Route::get('/', 'RelProdutosController@index')->name('relprodutos.index');
    Route::get('/estoque','RelProdutosController@estoque')->name('relprodutos.estoque');
    Route::get('/geral','RelProdutosController@geral')->name('relprodutos.geral');
    Route::post('/marca','RelProdutosController@marca')->name('relprodutos.marca');
    Route::post('/montadora','RelProdutosController@montadora')->name('relprodutos.montadora');
});
Route::group(['prefix' => '/relfornecedores'], function () {
    Route::get('/', 'RelFornecedoresController@index')->name('relfornecedores.index');
    Route::get('/geral','RelFornecedoresController@geral')->name('relfornecedores.geral');
});
Route::group(['prefix' => '/relvendas'], function () {
    Route::get('/', 'RelVendasController@index')->name('relvendas.index');
    Route::get('/geral','RelVendasController@geral')->name('relvendas.geral');
    Route::post('/cliente','RelVendasController@cliente')->name('relvendas.cliente');
    Route::post('/funcionario','RelVendasController@funcionario')->name('relvendas.funcionario');
    Route::post('/periodo','RelVendasController@periodo')->name('relvendas.periodo');
});
Route::group(['prefix' => '/relcompras'], function () {
    Route::get('/', 'RelComprasController@index')->name('relcompras.index');
    Route::get('/geral','RelComprasController@geral')->name('relcompras.geral');
    Route::post('/fornecedor','RelComprasController@fornecedor')->name('relcompras.fornecedor');
});
Route::group(['prefix' => '/relpagamentos'], function () {
    Route::get('/', 'RelPagamentosController@index')->name('relpagamentos.index');
    Route::post('/periodo', 'RelPagamentosController@periodo')->name('relpagamentos.periodo');
    Route::post('/atraso', 'RelPagamentosController@atraso')->name('relpagamentos.atraso');
});
Route::group(['prefix' => '/relrecebimentos'], function () {
    Route::get('/', 'RelRecebimentosController@index')->name('relrecebimentos.index');
    Route::post('/periodo', 'RelRecebimentosController@periodo')->name('relrecebimentos.periodo');
    Route::post('/atraso', 'RelRecebimentosController@atraso')->name('relrecebimentos.atraso');
});
