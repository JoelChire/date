<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultade extends Model
{
    public function escuelas()
    {
        return $this->hasMany('App\Escuela');
    }
}
