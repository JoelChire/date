<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    public function Persona()
    {
        return $this->belongsTo('App/Persona');
    }
    public function Escuela()
    {
        return $this->belongsTo('App/Escuela');
    }
    public function estudiantedocentecursos()
    {
        return $this->hasMany('App/Estudiantedocentecurso');
    }
}
