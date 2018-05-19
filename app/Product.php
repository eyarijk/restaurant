<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order', 'order_product');
    }

    public function getPrice()
    {
        return $this->price / 100;
    }
}
