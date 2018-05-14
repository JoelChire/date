<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    public function Facultade()
    {
        return $this->belongsTo('App\Facultade');
    }
    public function cursos()
    {
        return $this->hasMany('App\Curso');
    }
    public function estudiantes()
    {
        return $this->hasMany('App\Estudiante');
    }
}
