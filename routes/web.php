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

Route::prefix('filmes')->group(function () {

    Route::prefix('categorias')->group(function () {
        Route::get('/', 'FilmeCategoriaController@index')->name('categorias.index');
        Route::get('show/{id}', 'FilmeCategoriaController@show')->name('categorias.show');
        Route::get('create', 'FilmeCategoriaController@create')->name('categorias.create');
        Route::get('edit/{id}', 'FilmeCategoriaController@edit')->name('categorias.edit');
        Route::post('store', 'FilmeCategoriaController@store')->name('categorias.store');
        Route::put('update', 'FilmeCategoriaController@update')->name('categorias.update');
        Route::put('destroy', 'FilmeCategoriaController@destroy')->name('categorias.destroy');
    });

    Route::prefix('filmes')->group(function () {
        Route::get('/', 'FilmeController@index')->name('filmes.index');
        Route::get('show/{filme}', 'FilmeController@show')->name('filmes.show');
        Route::get('create', 'FilmeController@create')->name('filmes.create');
        Route::post('store', 'FilmeController@store')->name('filmes.store');
        Route::put('update/{filme}', 'FilmeController@update')->name('filmes.update');
        Route::put('destroy/{filme}', 'FilmeController@destroy')->name('filmes.destroy');
    });
});

Route::prefix('produtos')->group(function () {

    Route::prefix('categorias')->group(function () {
        Route::get('/', 'ProdutoCategoriaController@index')->name('categorias_produtos.index');
        Route::get('show/{id}', 'ProdutoCategoriaController@show')->name('categorias_produtos.show');
        Route::get('create', 'ProdutoCategoriaController@create')->name('categorias_produtos.create');
        Route::post('store', 'ProdutoCategoriaController@store')->name('categorias_produtos.store');
        Route::put('update', 'ProdutoCategoriaController@update')->name('categorias_produtos.update');
        Route::put('destroy', 'ProdutoCategoriaController@destroy')->name('categorias_produtos.destroy');
    });

    Route::prefix('produtos')->group(function () {
        Route::get('/', 'ProdutoController@index')->name('produtos.index');
        Route::get('show/{filme}', 'ProdutoController@show')->name('produtos.show');
        Route::get('create', 'ProdutoController@create')->name('produtos.create');
        Route::post('store', 'ProdutoController@store')->name('produtos.store');
        Route::put('update/{filme}', 'ProdutoController@update')->name('produtos.update');
        Route::put('destroy/{filme}', 'ProdutoController@destroy')->name('produtos.destroy');
    });
});

Route::resource('/salas', 'SalaController');
Route::resource('/sessao', 'SessaoController');
