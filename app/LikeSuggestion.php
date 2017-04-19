<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeSuggestion extends Model
{
    public $timestamps = false;

    public $primaryKey = ["user_id", "suggestion_id"];
    public $incrementing = false;

    protected $fillable = [
        'isliking',
        'user_id',
        'suggestion_id'
    ];
}
