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

Route::get('/inscricao/create', function () {
    return view('inscricao.create');
});

Route::get('/inscricao/search', function () {
    return view('inscricao.search');
});

Route::get('/estado/cadastrar', '\App\Http\Controllers\EstadoController@cadastrar');
Route::get('/estado', '\App\Http\Controllers\EstadoController@index');
Route::get('/estado/editar/{id}', '\App\Http\Controllers\EstadoController@editar');
