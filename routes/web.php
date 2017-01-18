<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
// Rozhkova ev

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
//if (Auth::check())
//{
// Пользователь вошёл в систему...
Route::get('/home', 'HomeController@index');
Route::get('comments/paginate/{count}', 'HomeController@paginate');

/** ----------------------------------------------------------------------------- **/
Route::get('foo', function () {
    return 'Hello World1';
});
/** ----------------------------------------------------------------------------- **/

//}


