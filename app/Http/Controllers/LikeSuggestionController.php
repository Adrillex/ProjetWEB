<?php

namespace App\Http\Controllers;

use App\LikeSuggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class LikeSuggestionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->suggestion_id;
        $like = new LikeSuggestion();
        $like->user_id = Auth::user()->id;
        $like->suggestion_id = $id;
        if($request->state == "J'aime!")
            $like->isLiking = 1;
        else
            $like->isLiking = 0;
        $like->save();
        return redirect(route('suggestionBox.show', $id));
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
        if($request->state == "J'aime!")
            $like = 1;
        else
            $like = 0;
        DB::update('UPDATE `like_suggestions` SET `isLiking`= ? WHERE user_id=? AND suggestion_id=?', [$like, Auth::user()->id, $id]);
        return redirect(route('suggestionBox.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM `like_suggestions` WHERE user_id = ? AND suggestion_id = ?', [Auth::user()->id, $id]);
        return redirect(route('suggestionBox.show', $id));
    }
}
