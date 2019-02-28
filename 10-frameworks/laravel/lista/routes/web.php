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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

/* Definindo rotas */

// Podemos inserir uma função dentro de uma rota
Route::get('/', function(){
    echo "Posso executar qualquer ação aqui...";
});

// Podemos definir a rota diretamente, indicando o nome dela, seguido do controller@action
Route::get('/home', 'HomeController@index');

// Rota para receber um POST
Route::post('/home', 'HomeController@add');

Route::get('/delete/{id}', 'HomeController@del');

Route::get('/teste/{id}', 'HomeController@teste');
