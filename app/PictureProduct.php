<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PictureProduct extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'product_id'
    ];

    public function scopePictureId(){
        return DB::table('picture_products')->orderBy('id', 'desc')->first();
    }
}
