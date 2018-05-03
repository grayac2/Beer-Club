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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('review', 'ReviewController');
Route::resource('types', 'TypeController');
Route::resource('events', 'EventController');
Route::resource('beers', 'BeerController');


Route::post('review-data', 'ReviewController@reviewData');
Route::get('review-data', 'ReviewController@reviewData');

Route::post('event-data', 'EventController@eventData');
Route::get('event-data', 'EventController@eventData');

Route::post('beer-data', 'BeerController@beerData');
Route::get('beer-data', 'BeerController@beerData');
