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
        'id_categories'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function scopeSortProductDesc($query){
        return $query->orderByDesc('updated_at');
    }
}
