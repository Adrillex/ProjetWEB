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
    return redirect(route('home.index'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home.index');
Route::get('/error', 'HomeController@error');
Route::get('/legalNotice', 'HomeController@legalNotice');

Route::resource('/activities', 'ActivitiesController');
Route::resource('/products', 'ProductsController');
Route::resource('/news', 'NewsController');
Route::resource('/categories', 'CategoriesController');
Route::resource('/categoriesProduct', 'CategoriesProductController');
Route::resource('/suggestionBox', 'SuggestionBoxController', ['except' => ['edit']]);
Route::resource('/likeSuggestion', 'LikeSuggestionController', ['except' =>['index', 'show', 'edit', 'create']]);
Route::resource('/likePicture', 'LikePicturesController', ['only' =>['store', 'destroy']]);
Route::resource('/likeDates', 'LikeDatesController', ['except' =>['index', 'show', 'edit', 'create']]);
Route::resource('/buy', 'BuyController', ['except' => ['create', 'show', 'edit']]);
Route::resource('/pictures', 'PictureController', ['only'=>['store', 'update', 'destroy']]);//Show?
Route::resource('/commentaries', 'CommentariesController', ['except' => ['index', 'edit', 'update', 'show']]);
Route::resource('/profile', 'ProfileController', ['except' =>['create', 'store']]);