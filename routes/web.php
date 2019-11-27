<?php

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
Route::resource('/template', 'TemplateController');
// Funcionario
Route::get('/funcionario/{id}/destroy', 'FuncionarioController@destroy');
Route::get('/funcionario/verificar-cpf/{cpf}', 'FuncionarioController@verificarCpf');
Route::resource('/funcionario', 'FuncionarioController');
//Tipo_Item
Route::get('/tipo_item/{id}/destroy', 'TipoItemController@destroy');
Route::get('/tipo_item/verificar-codigo/{codigo}', 'TipoItemController@verificarCodigo');
Route::resource('/tipo_item', 'TipoItemController');
// Cliente
Route::get('/cliente/{id}/destroy', 'ClienteController@destroy');
Route::get('/cliente/verificar-email/{email}', 'ClienteController@verificarEmail');
Route::resource('/cliente', 'ClienteController');
// Orçamento
Route::get('/orcamento/{id}/destroy', 'OrcamentoController@destroy');
Route::resource('/orcamento', 'OrcamentoController');
// Endereço
Route::get('/endereco/{id}/destroy', 'EnderecoController@destroy');
Route::resource('/endereco', 'EnderecoController');
// Orçamento_Item
Route::get('/orcamento_item/{id}/destroy', 'OrcamentoItemController@destroy');
Route::resource('/orcamento_item', 'OrcamentoItemController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
