<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reunione extends Model
{
    public function Tutoreestudiante()
    {
        return $this->belongsTo('App/Tutoreestudiante')
    }
}
