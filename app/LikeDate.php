<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeDate extends Model
{
    protected $fillable = [
        'user_id',
        'date_id'
    ];

    public $timestamps=false;
}
