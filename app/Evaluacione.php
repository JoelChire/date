<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacione extends Model
{
    public function eedcs()
    {
        return $this->hasMany('App/Eedc')
    }
}
