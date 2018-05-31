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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::get('estudiantes/show/{id}', [
    'as' => 'estudiantes',
    'uses' => 'EstudiantesController@show',
]);
Route::group(['middleware' => 'auth'], function()
{
	Route::resource('estudiantes', 'EstudiantesController');
});

Route::get('/docentes/index', 'DocentesController@index')->name('docentes');
