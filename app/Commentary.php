<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    protected $fillable = [
        'content',
        'creation_date',
        'activity_id',
        'user_id'
    ];

    public $timestamps = false;

    public static $rules = [
        'content' => 'required',
    ];
}
