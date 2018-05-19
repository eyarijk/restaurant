<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function table()
    {
        return $this->hasMany('App\Table');
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
