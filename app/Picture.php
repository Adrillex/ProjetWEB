<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Picture extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'activity_id',
        'user_id',
        'status'
    ];

    public static $rules = [
        'activity_id' => 'bail | required | max:100',
        'user_id' => 'required | min: 30',
    ];

    public function scopePictureId(){
        return DB::table('pictures')->orderBy('id', 'desc')->first();
    }
}
