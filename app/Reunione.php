<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reunione extends Model
{
    public function Estudiantedocentecurso()
    {
        return $this->belongsTo('App/Estudiantedocentecurso')
    }
}
