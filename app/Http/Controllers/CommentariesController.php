<?php

namespace App\Http\Controllers;

use App\Commentary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentariesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($activity)
    {
        return view('commentaries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->content == null){
            $time = Carbon::now()->toDateTimeString();
            $request->merge(['user_id' => Auth::user()->id, 'creation_date' => $time]);
            Commentary::create($request->all());
        }
        return redirect(route('activities.show', $request->activity_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commentary = Commentary::where('id', $id)->first();
        $commentary->delete();
        return back();
    }
}
