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

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('estudiantes', 'EstudiantesController');
    Route::resource('docentes', 'DocentesController');
});

Route::get('/docentes/index', 'DocentesController@index')->name('docentes');

//Route::get('milca/{idguest}','EstudiantesController@nota');
//Route::get('/milca', 'EstudiantesController@nota');
//Route::resource('/milca', 'EstudiantesController');

Route::get('milca/{idguest}', [
    'as' => 'milca',
    'uses' => 'DocentesController@nota',
]);
Route::get('gethint', function()
{
    $notasestudiante = \DB::table('users')
    ->select('evaluaciones.nombre as nombre', 'eedcs.valor as valor')
    ->join('personas', 'personas.user_id', '=', 'users.id')
    ->join('estudiantes', 'estudiantes.persona_id', '=', 'personas.id')
    ->join('estudiantedocentecursos', 'estudiantedocentecursos.estudiante_id', '=', 'estudiantes.id')
    ->join('docentecursos', 'estudiantedocentecursos.docentecurso_id', '=', 'docentecursos.id')
    ->join('cursos', 'docentecursos.curso_id', '=', 'cursos.id')
    ->join('eedcs', 'eedcs.estudiantedocentecurso_id', '=', 'estudiantedocentecursos.id')
    ->join('evaluaciones', 'eedcs.evaluacione_id', '=', 'evaluaciones.id')
    ->where('estudiantes.id', 1)
    ->where('docentecursos.id', 1)
    ->where('estudiantedocentecursos.id',1)
    ->get();

	
    return response()->json(array('nota'=> $notasestudiante), 200);

});
