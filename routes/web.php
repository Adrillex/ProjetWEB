<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/error', 'HomeController@error');

Route::resource('/activities', 'ActivitiesController');
Route::resource('/products', 'ProductsController');
Route::resource('/news', 'NewsController');
Route::resource('/categories', 'CategoriesController');
Route::resource('/categoriesProduct', 'CategoriesProductController');
Route::resource('/suggestionBox', 'SuggestionBoxController', ['except' => ['edit']]);
Route::resource('/likeSuggestion', 'LikeSuggestionController', ['except' =>['index', 'show', 'edit', 'create']]);
Route::resource('/likePicture', 'LikePicturesController', ['only' =>['store', 'destroy']]);
Route::resource('/likeDates', 'LikeDatesController', ['except' =>['index', 'show', 'edit', 'create']]);
Route::resource('/buy', 'BuyController');
Route::resource('/pictures', 'PictureController', ['only'=>['store', 'update', 'destroy']]);//Show?
Route::resource('/activities.commentaries', 'CommentariesController', ['except' => ['index', 'edit', 'update']]);