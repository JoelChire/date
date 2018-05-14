<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docentecurso extends Model
{
    public function Docente()
    {
        return $this->belongsTo('App/Docente');
    }
    public function Curso()
    {
        return $this->belongsTo('App/Curso');
    }
    public function estudiantedocentecursos()
    {
        return $this->hasMany('App/Estudiantedocentecurso');
    }
}
