<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
            'title',
            'content',
            'price',
            'id_user'
    ];

    public function scopeSortActivityDesc($query) {
        return $query->orderByDesc('created_at')->limit(5);
    }
}
