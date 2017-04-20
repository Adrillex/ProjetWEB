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

    public function scopePictureId(){
        return DB::table('pictures')->orderBy('id', 'desc')->first();
    }
}
