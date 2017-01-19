<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Rozhkova ev
// routes/api.php
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['namespace' => 'Api'], function () {
    Route::post('signup', 'UsersController@signup');
});

Route::group(['namespace' => 'Api', 'middleware'=>'auth:api'], function () {
    //Route::resource('comments', 'CommentsController',  ['only' => ['index', 'show']]);

    Route::get('comments/', 'CommentsController@index');
    Route::get('comments/{id}', 'CommentsController@show');
    Route::get('comments/paginate/{count}', 'CommentsController@paginate');
    Route::post('comments/', 'CommentsController@store');
    Route::put('comments/{id}', 'CommentsController@update');
    Route::delete('comments/{id}', 'CommentsController@destroy');
});