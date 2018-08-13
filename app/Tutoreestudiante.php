<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutoreestudiante extends Model
{
  public function Tutore()
  {
      return $this->belongsTo('App/Tutore');
  }
  public function Estudiante()
  {
      return $this->belongsTo('App/Estudiante');
  }
  public function reuniones()
  {
      return $this->hasMany('App/Reunione');
  }
}
