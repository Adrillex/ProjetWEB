<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuggestionBox extends Model
{
    protected $fillable = [
        'title',
        'content',
        'id_category',
        'id_user'
    ];

    public static $rules = [
        'title' => 'bail | required | max:100',
        'content' => 'required | min: 100',
    ];

    public function scopeSortSuggestionDesc($query){
        return $query -> orderByDesc('created_at')->limit(5);
    }

    public function scopeSortSuggestionPopular($query){
    }
}
