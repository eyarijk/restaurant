<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function hall()
    {
        return $this->belongsTo('App\Hall');
    }
}
