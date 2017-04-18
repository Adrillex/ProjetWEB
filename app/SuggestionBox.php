<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuggestionBox extends Model
{

    public $table = "suggestion_box";


    protected $fillable = [
        'title',
        'content',
        'category_id',
        'user_id'
    ];

    public static $rules = [
        'title' => 'bail | required | max:100',
        'content' => 'required | min: 30',
    ];

    public function scopeSortSuggestionDesc($query){
        return $query -> orderByDesc('created_at')->limit(5);
    }

    public function scopeSortSuggestionPopular($query){
    }
}
