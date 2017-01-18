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
    //Route::resource('comments', 'CommentsController',  ['only' => ['index', 'show']]);

    Route::get('comments/', 'CommentsController@index');
    Route::get('comments/{id}', 'CommentsController@show');
    Route::get('comments/paginate/{count}', 'CommentsController@paginate');
    Route::post('comments/', 'CommentsController@store');
    Route::put('comments/{id}', 'CommentsController@update');
    Route::delete('comments/{id}', 'CommentsController@destroy');
});
/*Route::resource('photo', 'PhotoController',
    ['only' => ['index', 'show']]);

Route::resource('photo', 'PhotoController',
    ['except' => ['create', 'store', 'update', 'destroy']]);*/

/*this.$http.get('/oauth/clients')
.then(response => {
    console.log(response.data);
});*/

/*
 *
 *
// Route that user is forwarded back to after approving on server
Route::get('callback', function (Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post('http://guestbook/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 1, // from admin panel above
            'client_secret' => 'yxOJrP0L9gqbXxoxoFl5I22IytFOpeCnUXD3aE0d', // from admin panel above
            'redirect_uri' => 'http://guestbook/callback',
            'code' => $request->code // Get code from the callback
        ]
    ]);

    // echo the access token; normally we would save this in the DB
    return json_decode((string) $response->getBody(), true)['access_token'];
});*/