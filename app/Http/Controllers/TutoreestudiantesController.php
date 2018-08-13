<?php

namespace App\Http\Controllers;
use App\Tutoreestudiante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Estudiante;

use Session;
use Redirect;

class TutoreestudiantesController extends Controller
{
    public function index()
    {
        $tutoreestudiantes = Tutoreestudiante::All();

        return view('tutoreestudiantes.index',compact('tutoreestudiantes'));
    }

    public function show($id)
    {
        $tutoreestudiante = Tutoreestudiante::find($id);
        return view('tutoreestudiantes.show',compact('tutoreestudiante'));
    }
}
