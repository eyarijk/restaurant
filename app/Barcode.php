<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    protected $fillable = [
        'customer_id',
        'order_id',
        'place_id',
        'table_id',
        'file_path',
    ];
}
