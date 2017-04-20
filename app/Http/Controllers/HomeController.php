<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\SuggestionBox;
use App\Activity;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suggestionList = SuggestionBox::SortSuggestionDesc()->get();
        $news = News::get();
        $activities = Activity::SortActivityDesc()->get();
        return view('home', compact('news', 'suggestionList', 'activities'));
    }
    public function error()
    {
        return view('error');
    }
}
