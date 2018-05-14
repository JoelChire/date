<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    public function Escuela()
    {
        return $this->belongsTo('App/Escuela');
    }
    public function docentecursos()
    {
        return $this->hasMany('App/Docentecurso');
    }
}
