<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rolepolitica extends Model
{
    public function Politica()
    {
        return $this->belongsTo('App/Politica');
    }
    public function Role()
    {
        return $this->belongsTo('App/Role');
    }
}
