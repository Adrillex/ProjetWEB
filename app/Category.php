<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = [
            'name'
    ];

    //for the foreign key of the suggestion
    public function suggestion(){
        return $this->hasMany('App\Suggestion');
    }

    //for the foreign key of the products
    public function product(){
        return $this->hasMany('App\Product');
    }

    public function scopeSortCategoriesDesc($query){
        return $query->orderByDesc('name');
    }
}
