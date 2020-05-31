<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::post('/reg', 'CustomRegisterController@register');

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function () {
    /**
     * Rutas clientes
     */
    Route::get('/cliente', [
        'as' => 'clientes.index',
        'uses' => 'ClientesController@index'
    ]);

    Route::get('/cliente/create', [
        'as' => 'cliente.create',
        'uses' => 'ClientesController@create'
    ]);

    Route::post('/cliente/create', [
        'as' => 'cliente.store',
        'uses' => 'ClientesController@store'
    ]);

    /**
     * Ruta pedidos
     */
    Route::get('/pedido/create', [
        'as' => 'pedidos.create',
        'uses' => 'PedidosController@create'
    ]);

    Route::post('/pedido/create', [
        'as' => 'pedidos.store',
        'uses' => 'PedidosController@store'
    ]);
    /**
     * Ruta catalogos
     */
    Route::get('/catalogo/create', [
        'as' => 'catalogo.create',
        'uses' => 'CatalogosController@create'
    ]);

    Route::post('/catalogo/create', [
        'as' => 'catalogo.store',
        'uses' => 'CatalogosController@store'
    ]);
});
