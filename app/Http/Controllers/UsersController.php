<?php

namespace App\Http\Controllers;
use App\User;
use App\Departamento;
use Hash;
use Auth;
use Validator;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function password()
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

       /* PARTE MIRIAM */ 

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
      ->join('sexos','sexos.id','=','personas.sexo_id')
      ->join('docentes','docentes.persona_id','=','personas.id')
      ->join('departamentos','departamentos.id','=','docentes.departamento_id')
      ->join('docentecursos','docentecursos.docente_id','=','docentes.id')
      ->join('cursos','cursos.id','=','docentecursos.curso_id')
      ->join('escuelas','escuelas.id','=','cursos.escuela_id')
      ->join('facultades','facultades.id','=','escuelas.facultade_id')
      
      ->where('users.id', $id_user)
      ->first();
      return view('users.password',compact('personaUser','departamentos','cursosdocentes'));
     // return view('user.password',compact('cursos'));
    }
    
    public function updatePassword(Request $request)
    {
      $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];
      $messages = [
          
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Los passwords no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];
      $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('users/password')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('id', '=', Auth::user()->id)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('users/password')->with('status', 'Contraseña cambiada con éxito');
            }
            else
            {
                return redirect('users/password')->with('message', 'Crontraseña incorrecta');
            }
        }
    }
}
