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
        'user_id',
        'status',
    ];

    public static $rules = [
        'title' => 'bail | required | max:100',
        'content' => 'required | min: 30',
        'category_id' => 'required',
        'user_id' => 'required',
        ];

    public function scopeSortSuggestionDesc($query){
        return $query -> orderByDesc('created_at')->limit(5);
    }

    public function scopeSortSuggestionAsc($query){
        return $query -> orderByAsc('created_at')->limit(5);
    }

    public function scopeSortSuggestionStatus($query, $status){
        return $query -> where('status', $status)->limit(5);
    }


    public function scopeSortSuggestionPopular($query){

    }
}
