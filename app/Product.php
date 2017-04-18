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
        return $this->belongsToMany('App\User', 'buy', 'id_product', 'id_user')->withPivot('quantity');
    }

    public function scopeSortProductDesc($query){
        return $query->orderByDesc('updated_at');
    }
}
