<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eedc extends Model
{
    public function Evaluacione()
    {
        return $this->belongsTo('App/Evaluacione');
    }
    public function Estudiantedocentecurso()
    {
        return $this->belongsTo('App/Estudiantedocentecurso');
    }
}
