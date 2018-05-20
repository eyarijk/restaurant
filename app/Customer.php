<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone'
    ];

    public function order()
    {
        return $this->hasMany('App\Order');
    }

    public function getFullName()
    {
        return $this->first_name . ' '. $this->last_name;
    }
}
