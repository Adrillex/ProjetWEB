<?php

namespace App\Http\Controllers;

use App\likePicture;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class likePicturesController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->picture_id;
        $like = new LikePicture();
        $like->user_id = Auth::user()->id;
        $like->picture_id = $id;
        $like->save();
        $activity = Picture::where('picture_id', $id)->activity_id;
        return redirect(route('suggestionBox.show', $activity));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM `like_pictures` WHERE user_id = ? AND picture_id = ?', [Auth::user()->id, $id]);
        $activity = Picture::where('picture_id', $id)->activity_id;
        return redirect(route('suggestionBox.show', $id));
    }
}
