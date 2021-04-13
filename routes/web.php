<?php

use Illuminate\Support\Facades\Route;


//ROTA TESTE
// Route::get('/Painel', function(){
//     return view('painel.dashboard');
// });


//Agrupando as rotas
Route::group(['namespace' => 'App\Http\Controllers'], function () {

//ROTA PARA UTILIZAÇÃO DO CONTROLLER DO FIREBASE
Route::get('/firebase', 'FirebaseController@index');


//=========================================AUTENTICAÇÃO=====================================================

//ROTA PARA A TELA DE ENTRADA
Route::get('/', 'Login\AutenticacaoController@index')->name('Autenticacao.index');

//ROTA PARA A TELA DE LOGAR
Route::get('/Logar', 'Login\AutenticacaoController@logar')->name('Autenticacao.logar');

//ROTA PARA A TELA DE REGISTRO
Route::post('/Registrar', 'Login\AutenticacaoController@registro')->name('Autenticacao.registro');

//ROTA PARA A TELA DO PAINEL DE CONTROLE
Route::get('/Painel', 'Painel\PainelController@index')->name('Painel.index');

//=========================================AUTENTICAÇÃO=====================================================

//==========================================INSUMOS======================================================

//ROTA PARA EXIBIR O MENU DE INSUMOS
Route::get('/Painel/Insumos', 'Painel\InsumoController@index')->name('Painel.Insumos.index');

//ROTA PARA EXIBIR A LISTA DE INSUMOS
Route::get('/Painel/Insumos/list', 'Painel\InsumoController@list')->name('Painel.Insumos.list');

//ROTA PARA TELA DE CADASTRO DE UM REGISTRO
Route::get('/Painel/Insumos/list/create', 'Painel\InsumoController@create')->name('Painel.Insumos.create');

//ROTA PARA CADASTRAR UM REGISTRO
Route::post('/Painel/Insumos/list/store', 'Painel\InsumoController@store')->name('Painel.Insumos.store');

//ROTA PARA TELA DE ALTERAÇÃO DE UM REGISTRO
Route::get('/Painel/Insumos/list/edit/{insumo}', 'Painel\InsumoController@edit')->name('Painel.Insumos.edit');

//ROTA PARA ALTERAR UM REGISTRO
Route::put('/Painel/Insumos/edit/{insumo}', 'Painel\InsumoController@update')->name('Painel.Insumos.update');

//ROTA PARA EXCLUIR DE UM REGISTRO
Route::delete('/Painel/Insumos/destroy/{insumo}', 'Painel\InsumoController@destroy')->name('Painel.Insumos.destroy');

//ROTA PARA O MAPA
Route::get('/Painel/Insumos/mapa', 'Painel\InsumoController@mapa')->name('Painel.Insumos.mapa');

//==========================================INSUMOS======================================================

//============================================AGRICULTORES======================================================

//ROTA PARA EXIBIR O MENU DE AGRICULTORES
Route::get('/Painel/Agricultores', 'Painel\AgricultorController@index')->name('Painel.Agricultores.index');

//ROTA PARA EXIBIR A LISTA DE AGRICULTORES
Route::get('/Painel/Agricultores/list', 'Painel\AgricultorController@list')->name('Painel.Agricultores.list');

//ROTA PARA TELA DE CADASTRO DE UM USUARIO
Route::get('/Painel/Agricultores/list/create', 'Painel\AgricultorController@create')->name('Painel.Agricultores.create');

//ROTA PARA CADASTRAR UM USUARIO
Route::post('/Painel/Agricultores/store', 'Painel\AgricultorController@store')->name('Painel.Agricultores.store');

//ROTA PARA TELA DE ALTERAÇÃO DE UM USUARIO
Route::get('/Painel/Agricultores/list/edit/{agricultor}', 'Painel\AgricultorController@edit')->name('Painel.Agricultores.edit');

//ROTA PARA ALTERAR UM USUARIO
Route::put('/Painel/Agricultores/edit/{agricultor}', 'Painel\AgricultorController@update')->name('Painel.Agricultores.update');

//ROTA PARA EXCLUIR DE UM USUARIO
Route::delete('/Painel/Agricultores/destroy/{agricultor}', 'Painel\AgricultorController@destroy')->name('Painel.Agricultores.destroy');

//============================================AGRICULTORES======================================================


//============================================TECNICOS======================================================

//ROTA PARA EXIBIR O MENU DE AGRICULTORES
Route::get('/Painel/Tecnicos', 'Painel\TecnicoController@index')->name('Painel.Tecnicos.index');

//ROTA PARA EXIBIR A LISTA DE AGRICULTORES
Route::get('/Painel/Tecnicos/list', 'Painel\TecnicoController@list')->name('Painel.Tecnicos.list');

//ROTA PARA TELA DE CADASTRO DE UM USUARIO
Route::get('/Painel/Tecnicos/list/create', 'Painel\TecnicoController@create')->name('Painel.Tecnicos.create');

//ROTA PARA CADASTRAR UM USUARIO
Route::post('/Painel/Tecnicos/store', 'Painel\TecnicoController@store')->name('Painel.Tecnicos.store');

//ROTA PARA TELA DE ALTERAÇÃO DE UM USUARIO
Route::get('/Painel/Tecnicos/list/edit/{tecnico}', 'Painel\TecnicoController@edit')->name('Painel.Tecnicos.edit');

//ROTA PARA ALTERAR UM USUARIO
Route::put('/Painel/Tecnicos/edit/{tecnico}', 'Painel\TecnicoController@update')->name('Painel.Tecnicos.update');

//ROTA PARA EXCLUIR DE UM USUARIO
Route::delete('/Painel/Tecnicos/destroy/{tecnico}', 'Painel\TecnicoController@destroy')->name('Painel.Tecnicos.destroy');

//============================================TECNICOS======================================================

});
