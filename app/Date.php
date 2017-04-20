<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Date extends Model
{
    protected $fillable = [
            'date',
            'activity_id'
    ];

    public $timestamps=false;

    public function user(){
        return $this->belongsToMany('App\User', 'like_dates');
    }

    public function activity(){
        return $this->belongsTo('App\Activity');
    }

    public function scopeRetrieveComingDates(){
        $now = date_format(date_create('now', new \DateTimeZone('Europe/Paris')), 'Y-m-d H:i:s');
        return Date::select(DB::raw('MIN(date) AS date, activity_id'))->groupBy('activity_id')->having('date', '>' , $now)->orderBy('date', 'Asc');
    }

    public function scopeRetrievePastDates(){
        $now = date_format(date_create('now', new \DateTimeZone('Europe/Paris')), 'Y-m-d H:i:s');
        return Date::select(DB::raw('MIN(date) AS date, activity_id'))->groupBy('activity_id')->having('date', '<' , $now)->orderBy('date', 'Desc');
    }

    /*public function paginate($array, $perPage = 20, $pagestart=1){
        $page = Input::get('page', 1); // Get the current page or default to 1, this is what you miss!
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page, ['path' => $request->url(), 'query' => $request->query()]);
    }*/
}
