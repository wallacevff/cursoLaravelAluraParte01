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

Route::get('/series', 'SeriesController@listarSeries')->name('Series-Listar');
Route::get('/series/create', 'SeriesController@create')->name('Series-Adicionar');
Route::post('/series/create', 'SeriesController@store')->name('Series-Criar');
//Route::post('/series/remover/{id}', 'SeriesController@destroy');
Route::delete('/series/{id}', 'SeriesController@destroy')->name('Series-Excluir');
Route::get('/series/editar/{id}', 'SeriesController@editar'); //->name('Series-Editar');
Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');