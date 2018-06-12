<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    public function Persona()
    {
        return $this->belongsTo('App/Persona');
    }
    public function Departamento()
    {
        return $this->belongsTo('App/Departamento');
    }
    public function docentecursos()
    {
        return $this->hasMany('App/Docentecurso');
    }
    public function supertutorasginas()
    {
        return $this->hasMany('App/Supertutorasigna');
    }
}
