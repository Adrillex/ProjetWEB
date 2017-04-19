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

    public function product(){
        return $this->belongsTo('App\Products');
    }

    public function scopePictureId(){
        return DB::table('picture_products')->orderBy('id', 'desc')->first();
    }

    public function scopeSortImage($id){
        $imageList = Array();
        foreach ($productList as $product){
            $id = $product->id;
            $imageList[$id] = DB::table('picture_products')->where('product_id' === $product->id);
            echo $imageList[$id];
        }
        var_dump($imageList);
        return $imageList;
    }

    public function scopeImage(){
        return DB::table('picture_products')->orderBy('id', 'asc');
    }

}
