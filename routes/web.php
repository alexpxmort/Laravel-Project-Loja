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


Route::resource('products','ProdutoController');

Route::get('/', function () {
    return redirect()->route('products.index');
});



Route::any('products/search','ProdutoController@search')->name('products.search');

Route::get('/', function () {
    return redirect()->route('products.index');
});
Route::resource('products_embalagem','ProdutoEmbalagemController');

Route::get('/embalagem', function () {
    return redirect()->route('products_embalagem.index');
});

Route::any('products_embalagem/search','ProdutoEmbalagemController@search')->name('products.search');
