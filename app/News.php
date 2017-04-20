<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    public static $rules = [
        'title' => 'bail | required | max:100',
        'content' => 'required | min: 15',
    ];
    public function scopeSortSuggestionDesc($query){
        return $query -> orderByDesc('created_at')->limit(5);
    }
}