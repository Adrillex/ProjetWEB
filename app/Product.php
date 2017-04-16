<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',

    ];

    public function scopeSortProductDesc($query){
        return $query->orderByDesc('updated_at');
    }
}
