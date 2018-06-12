<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;
use App\Departamento;
use App\Persona;
use App\Sexo;
use App\Facultade;
use App\User;
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
        ->where('cursos.id', $id_user)
       // ->where('cursos.id',$id) 
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
        
        return view('docentes.create',compact('cursosdocentes'));
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
        $departamentos = Departamento::pluck('nombre', 'id');

        $id_user = Auth::user()->id;

       $personaUser=\DB::table('users')  
        ->select('users.id as id','personas.nombre as nombre','personas.primerapellido as primerapellido',
        'personas.segundoapellido as segundoapellido','personas.dni as dni','personas.contacto as celular',
        'personas.direccion as direccion','docentes.codigo as codigo','docentes.profesion as profesion',
        'docentes.grado as grado','docentes.tutor as tutor','docentes.supertutor as supertutor',
        'facultades.sigla as facultad','departamentos.nombre as departamento','users.foto as foto',
        'personas.nacimiento as nacimiento','sexos.nombre as Genero','users.email as email')
        ->join('personas','personas.user_id','=','users.id')
        ->join('docentes','docentes.persona_id','=','personas.id')
        ->join('sexos','sexos.id','=','personas.sexo_id')
        ->join('docentecursos','docentecursos.docente_id','=','docentes.id')
        ->join('cursos','cursos.id','=','docentecursos.curso_id')
        ->join('escuelas','escuelas.id','=','cursos.escuela_id')
        ->join('facultades','facultades.id','=','escuelas.facultade_id')
        ->join('departamentos','departamentos.id','=','docentes.departamento_id')        
        ->where('users.id', $id_user)
        ->first();
        //dd($personaUser);
        //die;
        //  return view('docentes.show',(['personaUser'=>$personaUser]))  ;
       //alternativa return view('docentes.show',compact('sexos',$personaUser))  ;
       // return view('docentes.show',compact('docenteUser'));
        //return view('docentes.show')->with('personaUser',$personaUser);
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

        return view('docentes.show',compact('personaUser','departamentos','cursosdocentes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_user = Auth::user()->id;
        $departamentos = Departamento::pluck('nombre', 'id');
        $sexos = Sexo::pluck('nombre', 'id');
        $facultades = Facultade::pluck('sigla', 'id');
        $users= User::find($id);
        
        $personaUser=\DB::table('users')  
         ->select('users.id as id','personas.nombre as nombre','personas.primerapellido as primerapellido',
         'personas.segundoapellido as segundoapellido','personas.dni as dni','personas.contacto as celular',
         'personas.direccion as direccion','docentes.codigo as codigo','docentes.profesion as profesion',
         'docentes.grado as grado','facultades.sigla as facultad','docentes.departamento_id as departamentoid',
         'personas.nacimiento as nacimiento','personas.sexo_id as Genero','users.email as email',
         'users.password as contraseña')
         ->join('personas','users.id','=','personas.user_id')
         ->join('docentes','docentes.persona_id','=','personas.id')
         ->join('sexos','sexos.id','=','personas.sexo_id')
         ->join('docentecursos','docentecursos.docente_id','=','docentes.id')
         ->join('cursos','cursos.id','=','docentecursos.curso_id')
         ->join('escuelas','escuelas.id','=','cursos.escuela_id')
         ->join('facultades','facultades.id','=','escuelas.facultade_id')
         ->join('departamentos','departamentos.id','=','docentes.departamento_id')
         
         ->where('users.id', $id_user)
         ->first();


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
         //dd($personaUser);
         //return view('docentes.edit')->with('personaUser',$departamentos,$personaUser);
         return view('docentes.edit',compact('personaUser','sexos','facultades','departamentos','users','cursosdocentes'));
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
        $User = User::find($id);
        $personaUser = Persona::find($User->persona_id);

       // $personaUser -> departamento_id = $request -> departamentoid;
        $foto = $request ->file('foto');

        if($foto!=null)
        {
            $user = User::find($id);
            $name_photo = $foto->getClientOriginalName()."".$id;
            $foto->move(public_path()."/imagenes/users/",$name_photo);
            $user->foto = $name_photo;
            $user->save();
        }
       // $personaUser -> nombre = $request -> nombre;
        //$personaUser -> primerapellido = $request -> primerapellido;
        //$personaUser -> segundoapellido = $request -> segundoapellido;
        //$personaUser -> dni = $request -> dni;
        $personaUser -> contacto = $request -> celular;
        $personaUser -> direccion = $request -> direccion;

      //  $personaUser -> nacimiento = $request -> nacimiento;
        $docenteUser = Docente::find($id);
        
        $User -> email = $request -> email;

       $docenteUser -> departamento_id = $request -> departamentoid;
       //$docenteUser -> grado = $request -> grado;
       //$docenteUser -> profesion = $request -> profesion;

       //$personaUser-> sexo_id = $request -> Genero;
       $User -> save();       
        $personaUser  -> save();
        $docenteUser -> save();
        return redirect()->action('DocentesController@show',['$User -> id']);
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
