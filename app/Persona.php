<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public function Sexo()
    {
        return $this->belongsTo('App/Sexo');
    }
    public function Paise()
    {
        return $this->belongsTo('App/Paise');
    }
    public function telefonos()
    {
        return $this->hasMany('App/Telefono');
    }
    public function estudiantes()
    {
        return $this->hasMany('App/Estudiante');
    }
    public function docentes()
    {
        return $this->hasMany('App/Docente');
    }
}
