<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function table()
    {
        return $this->belongsTo('App\Place');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function place()
    {
        return $this->belongsTo('App\Place');
    }
}
