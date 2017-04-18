<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    public $timestamps = false;

    protected $fillable = [
            'name'
    ];

    //for the foreign key of the product
    public function product(){
        return $this->hasMany('App\Product');
    }

    public function scopeSortCategoriesProductDesc($query){
        return $query->orderByDesc('name');
    }
}
