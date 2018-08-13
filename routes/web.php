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

Route::group(['middleware' => 'auth'], function()
{
    //Route::resource('estudiantes', 'EstudiantesController');
    Route::resource('docentes', 'DocentesController');
    Route::get('/docentes/show', 'DocentesController@show')->name('show');
    Route::get('/docentes/show/{id}', [
    'as' => 'docentes',
    'uses' => 'DocentesController@show',
  	]);
});

/*Route::get('/docentes/show', 'DocentesController@show')->name('docentes');
Route::get('/docentes/create', 'DocentesController@create')->name('docentes'); */

Route::get('/users/password','UsersController@password')->name('password');
Route::post('/users/updatepassword','UsersController@updatePassword')->name('updatePassword');

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('tutoreestudiantes', 'TutoreestudiantesController');
    //Route::get('/tutoreestudiantes/tutorados', 'TutoreestudiantesController@tutorados')->name('tutorados');
});