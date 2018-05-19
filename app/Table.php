<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    public function order()
    {
        return $this->hasMany('App\Order');
    }
}
