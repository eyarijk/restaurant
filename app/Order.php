<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'table_id',
        'customer_id',
        'note',
        'total_price',
        'payment',
        'is_finished',
        'time',
        'place_id',
    ];

    protected $dates = ['time'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function table()
    {
        return $this->belongsTo('App\Table');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_product');
    }

    /**
     * @return float|int
     */
    public function getPrice()
    {
        return $this->total_price / 100;
    }
}
