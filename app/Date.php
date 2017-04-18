<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $fillable = [
            'date',
            'activity_id'
    ];

    public $timestamps=false;

    public function user(){
        return $this->belongsToMany('App\User', 'like_dates');
    }

    public function activity(){
        return $this->belongsTo('App\Activity');
    }
}
