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

Route::get('/inscricao/pesquisar', '\App\Http\Controllers\InscricaoController@pesquisar');
Route::get('/inscricao/formulario', '\App\Http\Controllers\InscricaoController@formulario');
Route::get('/inscricao/comprovante/{id}', '\App\Http\Controllers\InscricaoController@comprovante');

Route::get('/estado/cadastrar', '\App\Http\Controllers\EstadoController@cadastrar');
Route::get('/estado', '\App\Http\Controllers\EstadoController@index');
Route::get('/estado/editar/{id}', '\App\Http\Controllers\EstadoController@editar');
