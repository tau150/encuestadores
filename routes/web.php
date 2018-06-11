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

Route::get('/', function(){
  return redirect('/encuestadores');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('usuarios','UsuariosController')->middleware('checkProfile');
Route::resource('encuestas','EncuestaController')->middleware('auth');
Route::resource('encuestadores','EncuestadoresController')->middleware( 'auth');
Route::get('public/encuestadores','EncuestadoresController@indexPublic');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );