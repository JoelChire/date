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
use App\Curso;
use App\Telefono;
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
        

       // $id_curso= Auth::user()->id;   
       // $cursos= Curso::pluck('id');
      //  $cantidades = \DB::table('users')  
       //->selectcount(*) 
      //->join('personas', 'personas.user_id', '=', 'users.id')
       // ->join('estudiantes', 'estudiantes.persona_id', '=', 'personas.id')
       // ->join('estudiantedocentecursos', 'estudiantedocentecursos.estudiante_id', '=', 'estudiantes.id')
       // ->join('docentecursos','estudiantedocentecursos.docentecurso_id','=','docentecursos.id')
      // ->join('cursos','docentecursos.curso_id','=','cursos.id')
      //  ->where('users.id', $id_user)
     //   ->where('cursos.id', '2')
        //->where('cursos.id',$id) 
       // ->selectRaw('count(*) as Cantidad')
      //  ->get();
     //   return view('docentes.index',compact('cantidades','cursosdocentes'));
     //   return view('admintle.blade',compact('cursosdocentes'));
     $id_curso= Auth::user()->id;
     $cantidades = \DB::table('estudiantes')  
     //->selectcount(*) 
     ->join('estudiantedocentecursos','estudiantes.id','=','estudiantedocentecursos.estudiante_id') 
     ->join('docentecursos','estudiantedocentecursos.docentecurso_id','=','docentecursos.id')
     ->join('cursos','docentecursos.curso_id','=','cursos.id')
     ->where('cursos.id', '1')
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
        /** PARTE ARIEE */
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
        


        /** PARTE MIRIAM */
        
        $departamentos = Departamento::pluck('nombre', 'id');
        $id_user = Auth::user()->id;

       $personaUser=\DB::table('users')
        ->select('users.id as id','personas.nombre as nombre','personas.primerapellido as primerapellido',
        'personas.segundoapellido as segundoapellido','personas.dni as dni','personas.contacto as celular',
        'telefonos.numero as numero','personas.direccion as direccion','docentes.codigo as codigo',
        'docentes.profesion as profesion',
        'docentes.grado as grado','docentes.tutor as tutor','docentes.supertutor as supertutor',
        'facultades.sigla as facultad','departamentos.nombre as departamento','users.foto as foto',
        'personas.nacimiento as nacimiento','sexos.nombre as Genero','personas.facebook as facebook',
        'users.email as email')
        ->join('personas','personas.user_id','=','users.id')
        ->join('sexos','sexos.id','=','personas.sexo_id')
        ->join('docentes','docentes.persona_id','=','personas.id')
        ->join('departamentos','departamentos.id','=','docentes.departamento_id')
        ->join('docentecursos','docentecursos.docente_id','=','docentes.id')
        ->join('cursos','cursos.id','=','docentecursos.curso_id')
        ->join('escuelas','escuelas.id','=','cursos.escuela_id')
        ->join('telefonos', 'telefonos.persona_id', '=', 'personas.id')
        ->join('facultades','facultades.id','=','departamentos.facultade_id')
        ->where('users.id', $id_user) 
        ->first();
        //($personaUser);
        //die;
          //return view('docentes.show',(['personaUser'=>$personaUser]))  ;
       // return view('docentes.show',compact('sexos',$personaUser))  ;
       // return view('docentes.show',compact('docenteUser'));
        //return view('docentes.show')->with('personaUser',$personaUser);
        
       // return view('docentes.index',compact('cursosdocentes'));
       // return view('admintle.blade',compact('cursosdocentes'));
        return view('docentes.show',compact('personaUser','departamentos','id_user','cursosdocentes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /** PARTE ARIEE */
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
        
        
        

       /** PARTE MIRIAM */
       $id_user = Auth::user()->id;
        $departamentos = Departamento::pluck('nombre', 'id');
        $sexos = Sexo::pluck('nombre', 'id');
        $facultades = Facultade::pluck('sigla', 'id');
        $users= User::find($id);
       
        
        $personaUser=\DB::table('users')  
         ->select('users.id as id','personas.nombre as nombre','personas.primerapellido as primerapellido',
         'personas.segundoapellido as segundoapellido','personas.dni as dni','personas.contacto as celular',
         'telefonos.numero as numero','personas.direccion as direccion','docentes.codigo as codigo',
         'docentes.profesion as profesion','docentes.grado as grado','facultades.sigla as facultad',
         'docentes.departamento_id as departamentoid','personas.nacimiento as nacimiento',
         'personas.sexo_id as Genero','users.email as email','personas.facebook as facebook',
         'users.password as contraseña')
         ->join('personas','personas.user_id','=','users.id')
         ->join('telefonos', 'telefonos.persona_id', '=', 'personas.id')
         ->join('sexos','sexos.id','=','personas.sexo_id')
         ->join('docentes','docentes.persona_id','=','personas.id')
         ->join('departamentos','departamentos.id','=','docentes.departamento_id')
         ->join('docentecursos','docentecursos.docente_id','=','docentes.id')
         ->join('cursos','cursos.id','=','docentecursos.curso_id')
         ->join('escuelas','escuelas.id','=','cursos.escuela_id')
         ->join('facultades','facultades.id','=','escuelas.facultade_id')
         ->where('users.id', $id_user)
         ->first();
         //dd($personaUser);
         //die;
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
        
        /** PARTE ARIEE */
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

        /** PARTE MIRIAM */

        //$personaUser= Persona::find($id);
       $User= User::find($id);
       $personaUser = Persona::where('user_id',$id)->first();
       $telefonos = Telefono::where('persona_id',$personaUser -> id)->first();
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
        $telefonos -> numero = $request -> numero;
        $personaUser -> facebook =$request -> facebook;
        $personaUser -> contacto = $request -> celular;
        $personaUser -> direccion = $request -> direccion;
        $User -> email = $request -> email;
        //$personaUser -> password = $request -> contraseña;
      //  $personaUser -> nacimiento = $request -> nacimiento;
        //$docenteUser = Docente::find($id);
        $User -> save();
        $personaUser  -> save();
        $telefonos -> save();

        $personaUser= Persona::find($id);
        $docenteUser= Docente::where('persona_id',$id)->first();
        $docenteUser -> departamento_id = $request -> departamentoid;
        $docenteUser -> save();
   
     
       //return Redirect()->action('DocentesController@show');
      //return view('docentes.show',compact('cursosdocentes')); 
      //return view('admintle.blade',compact('cursosdocentes')); 
      return Redirect::route('docentes.show',[$personaUser -> id],[$cursosdocentes -> id]);   
       //dd($personaUser);
       //die;
       
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
