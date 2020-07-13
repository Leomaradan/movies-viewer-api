<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    public function movies()
    {
        return $this->hasMany('App\Movie');
    }
}
