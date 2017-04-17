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
    public function products(){
        return $this->hasMany('App\Products');
    }

    public function scopeSortCategoryDesc($query){
        $datas = $query->orderByDesc('name');
        $categoryList = Array();
        foreach ($datas as $data) {
            array_push($categoryList, $data);
        }
        return $categoryList;
    }
}
