<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Date;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivitiesController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('bde',['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::SortActivityDesc()->simplepaginate(10);
        $likedates = Auth::user()->date()->pluck('date_id', 'activity_id');
        foreach ($activities as $activity){
            $dates[$activity->id] = $activity->dates;
        }
        //if (isset($likedates[2])) echo 'test';
        //die();
        return view('activities.index', compact('activities', 'dates', 'likedates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['user_id' => Auth::user()->id]);
        $activity = Activity::create($request->all());
        for ($i = 0; $i < sizeof($request->date); $i++){
            $date = new Date();
            $date->activity_id = $activity->id;
            $date->date = $request->date[$i];
            $date->save();
        }
        if (isset($request->numberDay) && $request->numberDay != null){
            //dd('P' + $request->numberDay + 'D');
            $times = floor(50 / $request->numberDay) -1 ;
            dd($times);
            $Adate = date_create($request->date[0] . ':00');
            for ($i=0 ; $i< $times ; $i++){
                $activity = Activity::create($request->all());
                $Adate->add(new \DateInterval('P' . $request->numberDay . 'D'));
                $date = new Date();
                $date->activity_id = $activity->id;
                $date->date = date_format($Adate, 'Y-m-d H:i:s');
                $date->save();
            }
        }
        return redirect(route('activities.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = Activity::findOrFail($id);
        $dates = $activity->dates;
        foreach ($dates as $date){
            $likedates[$date->id] = $date->user;
        }
        //dd($likedates[2][0]);

        return view('activities.show', compact('activity', 'dates', 'likedates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
