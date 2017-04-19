<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Buy extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'quantity',
        'user_id',
        'product_id'
    ];
}
