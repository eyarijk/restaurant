<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function table()
    {
        return $this->belongsTo('App\Table');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_product');
    }

    public function getPrice()
    {
        return $this->total_price / 100;
    }
}
