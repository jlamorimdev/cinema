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

Route::resource('/filmes/categorias', 'FilmeCategoriaController');
Route::resource('/filmes/filmes', 'FilmeController');
Route::resource('/produtos/categorias_produtos', 'ProdutoCategoriaController');
Route::resource('/produtos/produtos', 'ProdutoController');
Route::resource('/salas', 'SalaController');
Route::resource('/sessao', 'SessaoController');
