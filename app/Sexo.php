<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    public function personas()
    {
        return $this->hasMany('App\Persona');
    }
}
