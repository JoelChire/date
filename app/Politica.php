<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Politica extends Model
{
    public function rolepoliticas()
    {
        return $this->hasMany('App\Rolepolitica');
    }
}
