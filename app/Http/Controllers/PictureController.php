<?php

namespace App\Http\Controllers;

use App\Picture;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

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
        // get the image from the form
        $img = Image::make(Input::file('image'));
        // get the id of the activity
        $id = $request->activity_id;
        // A user status equal to three means he's a cesi employee. The picture is automatically validated (status = 1)
        $user = Auth::user();
        if($user->status == 3)
            $status = 1;
        else
            $status = 0;
        Picture::create(['activity_id' => $id, 'user_id' => $user->id, 'status' => $status]);

        // get the id of the picture
        $image_id = Picture::PictureId()->id;
        // save the image with the size and the name
        $img->resize(300, 200)->save('img/activities/' . $image_id . '.PNG');
        return redirect(route('activities.show', $id));
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
