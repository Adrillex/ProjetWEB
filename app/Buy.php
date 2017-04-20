<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'quantity',
        'user_id',
        'product_id'
    ];
}
