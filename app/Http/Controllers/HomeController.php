<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\SuggestionBox;
use App\Activity;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @return home with suggestionlist, news list and activities list
     */
    public function index()
    {
        $suggestionList = SuggestionBox::SortSuggestionDesc()->get();
        $news = News::SortSuggestionDesc()->get();
        $activities = Activity::SortActivityDescHome()->get();
        return view('home', compact('news', 'suggestionList', 'activities'));
    }

    /**
     * @return error
     */
    public function error()
    {
        return view('error');
    }

    /**
     * @return legals notices
     */
    public function legalNotice()
    {
        return view('legalNotice');
    }
}
