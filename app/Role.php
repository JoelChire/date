<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function personas()
    {
        return $this->hasMany('App\Persona');
    }
    public function rolepoliticas()
    {
        return $this->hasMany('App\Rolepolitica');
    }
}
