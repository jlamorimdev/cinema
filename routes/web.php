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
        Route::get('show/{categoria}', 'FilmeCategoriaController@show')->name('categorias.show');
        Route::get('create', 'FilmeCategoriaController@create')->name('categorias.create');
        Route::get('edit/{categoria}', 'FilmeCategoriaController@edit')->name('categorias.edit');
        Route::post('store', 'FilmeCategoriaController@store')->name('categorias.store');
        Route::patch('update/{categoria}', 'FilmeCategoriaController@update')->name('categorias.update');
        Route::delete('destroy/{categoria}', 'FilmeCategoriaController@destroy')->name('categorias.destroy');
    });

    Route::prefix('filmes')->group(function () {
        Route::get('/', 'FilmeController@index')->name('filmes.index');
        Route::get('show/{filme}', 'FilmeController@show')->name('filmes.show');
        Route::get('create', 'FilmeController@create')->name('filmes.create');
        Route::get('edit/{filme}', 'FilmeController@edit')->name('filmes.edit');
        Route::post('store', 'FilmeController@store')->name('filmes.store');
        Route::patch('update/{filme}', 'FilmeController@update')->name('filmes.update');
        Route::delete('destroy/{filme}', 'FilmeController@destroy')->name('filmes.destroy');
    });
});

Route::prefix('produtos')->group(function () {

    Route::prefix('categorias')->group(function () {
        Route::get('/', 'ProdutoCategoriaController@index')->name('produtos.categorias.index');
        Route::get('show/{categoria}', 'ProdutoCategoriaController@show')->name('produtos.categorias.show');
        Route::get('create', 'ProdutoCategoriaController@create')->name('produtos.categorias.create');
        Route::get('edit/{categoria}', 'ProdutoCategoriaController@edit')->name('produtos.categorias.edit');
        Route::post('store', 'ProdutoCategoriaController@store')->name('produtos.categorias.store');
        Route::patch('update/{categoria}', 'ProdutoCategoriaController@update')->name('produtos.categorias.update');
        Route::delete('destroy/{categoria}', 'ProdutoCategoriaController@destroy')->name('produtos.categorias.destroy');
    });

    Route::prefix('produtos')->group(function () {
        Route::get('/', 'ProdutoController@index')->name('produtos.index');
        Route::get('show/{produto}', 'ProdutoController@show')->name('produtos.show');
        Route::get('create', 'ProdutoController@create')->name('produtos.create');
        Route::get('edit/{produto}', 'ProdutoController@edit')->name('produtos.edit');
        Route::post('store', 'ProdutoController@store')->name('produtos.store');
        Route::patch('update/{produto}', 'ProdutoController@update')->name('produtos.update');
        Route::delete('destroy/{produto}', 'ProdutoController@destroy')->name('produtos.destroy');
    });
});

Route::resource('/salas', 'SalaController');
Route::resource('/sessao', 'SessaoController');
