<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;
use DB;

class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        $cursosdocentes = \DB::table('users')        
        ->select('cursos.nombre as Nombre','escuelas.sigla AS Escuela', 'facultades.sigla as Facultad')
        ->join('personas', 'personas.user_id', '=', 'users.id')
        ->join('docentes','docentes.persona_id','=','personas.id')     
        ->join('docentecursos','docentecursos.docente_id','=','docentes.id')
        ->join('cursos','docentecursos.curso_id','=','cursos.id')
        ->join('escuelas','cursos.escuela_id','=','escuelas.id')
        ->join('facultades','escuelas.facultade_id','=','facultades.id')         
        ->where('users.id', $id_user)
        //->groupby('cursos.nombre', 'escuelas.sigla' , 'facultades.sigla')
        ->get();
       // return view('docentes.index',compact('cursosdocentes'));
        

        $id_curso= Auth::user()->id;
        $cantidades = \DB::table('estudiantes')  
        //->selectcount(*) 
        ->join('estudiantedocentecursos','estudiantes.id','=','estudiantedocentecursos.estudiante_id') 
        ->join('docentecursos','estudiantedocentecursos.docentecurso_id','=','docentecursos.id')
        ->join('cursos','docentecursos.curso_id','=','cursos.id')
        ->where('cursos.id',$id_curso) 
        ->selectRaw('count(*) as Cantidad')
        ->get();
        return view('docentes.index',compact('cantidades','cursosdocentes'));
        return view('admintle.blade',compact('cursosdocentes'));



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
