<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
            'title',
            'content',
            'price',
            'user_id'
    ];

    public function scopeSortActivityDesc($query) {
        return $query->orderByDesc('created_at')->limit(5);
    }

    public function dates(){
        return $this->hasMany('App\Date');
    }
}
