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
        'category_id'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function user(){
        return $this->belongsToMany('App\User', 'buy', 'product_id', 'user_id')->withPivot('quantity');
    }

    public function scopeSortProductDesc($query){
        return $query->orderByDesc('updated_at');
    }
}
