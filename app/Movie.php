<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function studio()
    {
        return $this->belongsTo('App\Studio');
    }

    public function actors()
    {
        return $this->belongsToMany('App\Actor');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
