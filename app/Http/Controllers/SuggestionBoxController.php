<?php

namespace App\Http\Controllers;

use App\LikeSuggestion;
use App\SuggestionBox;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuggestionBoxController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['index']]);
        $this->middleware('bde', ['only' => ['update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suggestionList = SuggestionBox::SortSuggestionDesc()->get();
        foreach($suggestionList as $suggestion){
           $user[$suggestion->user_id] = User::where('id', $suggestion->user_id)->first();
        }

        return view('suggestionBox.index', compact(['suggestionList', 'user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $catnames = array();
        foreach($categories as $category){
            $catnames[$category->id] = $category->name;
        }
        return view('suggestionBox.create', compact('catnames'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, SuggestionBox::$rules);
        $request->merge(['user_id' => Auth::user()->id, 'status' => 0]);
        $suggestion = SuggestionBox::create($request->all());
        return redirect(route('suggestionBox.index', $suggestion));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suggestion=SuggestionBox::findOrFail($id);
        $user = User::where('id', $suggestion->user_id)->first();
        $current = Auth::user()->id;
        $liked = LikeSuggestion::where('user_id', $current)->where('suggestion_id', $id)->first();

        $likeScore = likeSuggestion::where('suggestion_id', $id)->where('isLiking', 1)->count();
        $dislikeScore = likeSuggestion::where('suggestion_id', $id)->where('isLiking', 0)->count();
        $voters = $likeScore + $dislikeScore;
        $score = $likeScore - $dislikeScore;
        switch($voters){
            case 0: $text = "Personne n'a voté pour cette idée.";
            break;
            case 1: $text = 'Une personne a voté pour cette idée. Son score est de ' . $score;
            break;
            default: $text = $voters . ' personnes ont voté pour cette idée. Son score est de ' . $score;
            break;
        }
        $statusList = ["Proposée","Acceptée", "Rejetée"];
        return view('suggestionBox.show', compact(['suggestion', 'user', 'liked', 'text', 'statusList']));
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
        dd($request);
        $this->validate($request, suggestionBox::$rules);
        $suggestion = SuggestionBox::findOrFail($id);
        $suggestion->update($request->all());
        return redirect(route('suggestionBox.show', $suggestion ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suggestion = SuggestionBox::findOrFail($id);
        $suggestion->delete();
        return redirect(route('suggestionBox.index'));
    }
}

