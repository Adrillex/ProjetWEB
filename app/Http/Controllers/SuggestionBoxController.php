<?php

namespace App\Http\Controllers;

use App\SuggestionBox;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuggestionBoxController extends Controller
{
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
        return view('suggestionBox.create');
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
        $request->merge(['user_id' => Auth::user()->id]);
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
        return view('suggestionBox.show', compact(['suggestion', 'user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suggestion=SuggestionBox::findOrFail($id);
        return view('suggestionBox.edit', compact('suggestion'));
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
        $this->validate($request, News::$rules);

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

