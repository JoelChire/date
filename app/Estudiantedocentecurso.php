<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiantedocentecurso extends Model
{
    public function Estudiante()
    {
        return $this->belongsTo('App/Estudiante');
    }
    public function Docentecurso()
    {
        return $this->belongsTo('App/Docentecurso');
    }
    public function eedcs()
    {
        return $this->hasMany('App/Eedc');
    }
    public function reuniones()
    {
        return $this->hasMany('App/Reunione');
    }
}
