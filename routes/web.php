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

Route::get('buscador/filtro/', 'Buscador\BuscadorController@getBuscador')->name('filtroBuscador');

Auth::routes(['verify' => true, 'register' => false]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('descargar/pdf/{documento}', 'Buscador\BuscadorController@descargarPdf')->name('descargarPdf');

Route::get('grafica/{documento}.png','Buscador\BuscadorController@graph')->name('graph');