<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'category_id'
    ];

    public static $rules = [
            'name' => 'required|unique:products|max:32',
            'description' => 'required|min:20',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
    ];

    public function category(){
        return $this->belongsTo('App\CategoryProduct');
    }

    public function user(){
        return $this->belongsToMany('App\User', 'buys')->withPivot('quantity');
    }

    public function picture(){
        return $this->hasMany('App\PictureProduct');
    }

    public function scopeProductId(){
        return DB::table('products')->orderBy('id', 'desc')->first();
    }

    public function scopeSortProductDesc($query){
        return $query->orderByDesc('updated_at');
    }
}
