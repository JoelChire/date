<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutore extends Model
{
  public function Docente()
  {
      return $this->belongsTo('App/Docente');
  }
  public function tutoreestudiante()
  {
      return $this->hasMany('App/Tutoreestudiante');
  }
}
