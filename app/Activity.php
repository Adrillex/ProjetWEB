<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Activity extends Model
{
    protected $fillable = [
            'title',
            'content',
            'price',
            'user_id'
    ];

    public function scopeSortActivityDesc($query) {
        return $query->orderByDesc('created_at');
    }
    public function scopeSortActivityDescHome($query) {
        return $query->orderByDesc('created_at')->limit(5);
    }

    public function scopeActivityId(){
        return DB::table('activities')->orderBy('id', 'desc')->first();
    }

    public function dates(){
        return $this->hasMany('App\Date');
    }

    public function scopePictureAll($id){
        return DB::table('pictures')->where(['activity_id' => $id])->orderBy('id', 'desc');
    }

}
