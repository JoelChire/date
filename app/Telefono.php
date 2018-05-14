<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    public function Persona()
    {
        return $this->belongsTo('App/Persona');
    }
}
