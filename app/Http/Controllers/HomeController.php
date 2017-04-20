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
    public function index()
    {
        $suggestionList = SuggestionBox::SortSuggestionDesc()->get();
        $news = News::SortSuggestionDesc()->get();
        $activities = Activity::SortActivityDescHome()->get();
        return view('home', compact('news', 'suggestionList', 'activities'));
    }
    public function error()
    {
        return view('error');
    }
    public function legalNotice()
    {
        return view('legalNotice');
    }
}
