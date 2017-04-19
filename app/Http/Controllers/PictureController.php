<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PictureController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activity = $request->id;
        //get the image from the form
        $img = Image::make(Input::file('image'));
        // get the extension
        $mime = $img->mime();
        $mime = explode("/", $mime);
        // save in the database the image associated to the activity.
        // A user status equal to three means he's a cesi employee. The picture is automatically validated (status = 1)
        $user = Auth::user();
        if($user->status == 3)
            Picture::create(['activity_id' => $request->id, 'user_id' => $user->id, 'status' => 0]);
        else
            Picture::create(['activity_id' => $request->id, 'user_id' => $user->id, 'status' => 1]);
        // get the id of the picture
        $image_id = Picture::PictureId()->id;
        // save the image with the size and the name
        $img->save('img/activities/' . $image_id . '.' . $mime[1]);
        return redirect(route('activity.show', $activity));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $activity = Picture::where('id', $id)->activity_id;
        $picture = Picture::findOrFail($id);
        $picture->status = 1;
        $picture->save();
        return redirect(route('activities.show', $activity));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Picture::where('id', $id)->activity_id;
        Picture::findOrFail($id)->delete();
        return redirect(route('activities.show', $activity));
    }
}
