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
Route::get('/', 'SeriesController@listarSeries')->name('Series');
Route::get('/series', 'SeriesController@listarSeries')->name('Series-Listar');
Route::get('/series/create', 'SeriesController@create')->name('Series-Adicionar')->middleware('autenticador');
Route::post('/series/create', 'SeriesController@store')->name('Series-Criar')->middleware('autenticador');
//Route::post('/series/remover/{id}', 'SeriesController@destroy');
Route::delete('/series/{id}', 'SeriesController@destroy')->name('Series-Excluir')->middleware('autenticador');
Route::get('/series/editar/{id}', 'SeriesController@editar')->middleware('autenticador'); //->name('Series-Editar');
Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');
Route::post('/series/{id}/editaNome', 'SeriesController@editaNome')->middleware('autenticador');
Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')->middleware('autenticador');
Route::post('/temporadas/{temporada}/episodios/assistir/{episodioId}', 'EpisodiosController@assistirEpisodio');

//autenticador::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entrar', 'EntrarController@index')->name('Entrar');
Route::post('/entrar', 'EntrarController@entrar');

Route::get('/registrar', 'RegistroController@create')->name('registrar');
Route::post('/registrar', 'RegistroController@store');
Route::get('/sair', function (){ \Illuminate\Support\Facades\Auth::logout(); return redirect()->route('Entrar');});
