<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use Validator;

class UsersController extends Controller
{
    public function password()
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
      return view('user.password',compact('cursos','id_user'));
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
            'password.confirmed' => 'Los contraseñas no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];

      $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('user/password')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('id', '=', Auth::user()->id)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('estudiantes/perfil')->with('status', 'Contraseña cambiado con éxito');
            }
            else
            {
                return redirect('user/password')->with('message', 'Contraseña incorrecta');
            }
        }
    }
}
