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
    public function suggestionBox(){
        return $this->hasMany('App\SuggestionBox');
    }

    public function scopeSortCategoriesDesc($query){
        return $query->orderByDesc('name');
    }
}
