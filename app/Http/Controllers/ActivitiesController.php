<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Commentary;
use App\Date;
use App\Picture;
use App\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

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
        session_start();
        $activities = array();
        if (isset($_GET['nav'])){
            $nav = $_GET['nav'];
            $_SESSION['nav'] = $_GET['nav'];
        } else{
            if (isset($_SESSION['nav'])){
                $nav = $_SESSION['nav'];
            }else{
                $nav = 'coming';
                $_SESSION['nav'] = 'coming';
            }

        }
        if ($nav == 'coming'){
            $Adates = Date::RetrieveComingDates()->simplepaginate(10);
        }
        elseif ($nav = 'past'){
            $Adates = Date::RetrievePastDates()->simplepaginate(10);
            $_SESSION['nav'] = 'past';
        }
        $likedates = Auth::user()->date()->pluck('date_id', 'activity_id');
        for ($i=0; $i<sizeof($Adates); $i++){
            $activities[$Adates[$i]->activity_id] = Activity::find($Adates[$i]->activity_id);
            $dates[$Adates[$i]->activity_id] = $activities[$Adates[$i]->activity_id]->dates;
        }
        return view('activities.index', compact('Adates', 'dates', 'likedates', 'activities', 'nav'));
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
        if($request->price == null)$request->merge(['price' => 0]);
        //dd($request->price);
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
            $times = floor(365 / $request->numberDay) -1 ;
            //dd($times);
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
        $input = Input::file('image');
        $path = 'img/activities/';
        if(isset($input)){
            if(!isset($path)){
                File::makeDirectory($path);
            }
            //get the image from the form
            $img = Image::make($input);
            // get the id of the activity saved
            $activity_id = Activity::ActivityId()->id;
            // save the image with the size and the name
            $img->resize(300, 200)->save($path . $activity_id . '.PNG');
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
        $imageList = Picture::where('activity_id', $id)->get();
        foreach ($imageList as $image){
            $userPicture[$image->id] = User::where(['id' => $image->user_id])->get();
        }
        //Get commentaries of the current activity
        $userList = Array();
        $commentaries=Commentary::where('activity_id', $id)->get();
        foreach($commentaries as $commentary) {
            $userList[$commentary->user_id] = User::where('id', $commentary->user_id)->first();
        }

        return view('activities.show', compact('activity', 'dates', 'likedates', 'commentaries', 'userList', 'imageList', 'userPicture'));
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
