<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supertutorasigna extends Model
{
    public function Docente()
    {
        return $this->belongsTo('App/Docente');
    }
    public function Docente()
    {
        return $this->belongsTo('App/Docente');
    }
}
