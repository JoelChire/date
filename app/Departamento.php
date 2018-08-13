<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    public function docentes()
    {
        return $this->hasMany('App/Docente');
    }
    public function Facultade()
    {
        return $this->belongsTo('App/Facultade');
    }
}
