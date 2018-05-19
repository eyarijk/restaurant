<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function hall()
    {
        return $this->hasMany('App\Hall');
    }

    public function menu()
    {
        return $this->hasMany('App\Menu');
    }

    public function order()
    {
        return $this->hasMany('App\Order');
    }
}
