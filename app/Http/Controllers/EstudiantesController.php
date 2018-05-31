<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use App\Http\Controllers\Controller;
use App\Paise;
use App\Sexo;
use Auth;
use Session;
use Redirect;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        $cursos = \DB::table('users')
        ->select('cursos.id as id', 'cursos.nombre as nombre')
        ->join('personas', 'personas.user_id', '=', 'users.id')
        ->join('estudiantes', 'estudiantes.persona_id', '=', 'personas.id')
        ->join('estudiantedocentecursos', 'estudiantedocentecursos.estudiante_id', '=', 'estudiantes.id')
        ->join('docentecursos', 'estudiantedocentecursos.docentecurso_id', '=', 'docentecursos.id')
        ->join('cursos', 'docentecursos.curso_id', '=', 'cursos.id')
        ->where('users.id', $id_user)
        ->get();
        return view('estudiantes.index',compact('cursos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $id_user = Auth::user()->id;
      $notas = \DB::table('users')
      ->select('evaluaciones.nombre as nombre', 'eedcs.valor as valor')
      ->join('personas', 'personas.user_id', '=', 'users.id')
      ->join('estudiantes', 'estudiantes.persona_id', '=', 'personas.id')
      ->join('estudiantedocentecursos', 'estudiantedocentecursos.estudiante_id', '=', 'estudiantes.id')
      ->join('docentecursos', 'estudiantedocentecursos.docentecurso_id', '=', 'docentecursos.id')
      ->join('cursos', 'docentecursos.curso_id', '=', 'cursos.id')
      ->join('eedcs', 'eedcs.estudiantedocentecurso_id', '=', 'estudiantedocentecursos.id')
      ->join('evaluaciones', 'eedcs.evaluacione_id', '=', 'evaluaciones.id')
      ->where('users.id', $id_user)
      ->where('cursos.id', $id)
      ->get();
      $cursos = \DB::table('users')
      ->select('cursos.id as id', 'cursos.nombre as nombre')
      ->join('personas', 'personas.user_id', '=', 'users.id')
      ->join('estudiantes', 'estudiantes.persona_id', '=', 'personas.id')
      ->join('estudiantedocentecursos', 'estudiantedocentecursos.estudiante_id', '=', 'estudiantes.id')
      ->join('docentecursos', 'estudiantedocentecursos.docentecurso_id', '=', 'docentecursos.id')
      ->join('cursos', 'docentecursos.curso_id', '=', 'cursos.id')
      ->where('users.id', $id_user)
      ->get();
      return view('estudiantes.show',compact('cursos','notas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
