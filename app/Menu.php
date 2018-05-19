<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
