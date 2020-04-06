<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    public function order()
    {
        $this->belongsTo('App\Order');
    }

    public function meal()
    {
        $this->belongsTo('App\Meal');
    }
}
