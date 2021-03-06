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

Route::get('/autenticacao', function () {
    $query = http_build_query([
        'client_id' => 3,
        'redirect_uri' => 'http://localhost:9000/callback',
        'response_type' => 'code',
        'scope' => ''
    ]);

    return redirect("http://localhost:8000/oauth/authorize?$query");
});

Route::get('callback', function () {
    $code = request('code');

    $http = new \GuzzleHttp\Client();

    $response = $http->post('http://localhost:8000/oauth/token', [
       'form_params' => [
           'client_id' => 3,
           'client_secret' => 'kpHTxromgNulQ1PiuH7QvElHRDuQ71BA2KgtS7hr',
           'redirect_uri' => 'http://localhost:9000/callback',
           'code' => $code,
           'grant_type' => 'authorization_code'
       ]
    ]);

    dd(json_decode($response->getBody(), true));
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/messages', 'MessagesController@send')->name('messages');
Route::get('/message', 'MessagesController@create')->name('message');
Route::post('/message', 'MessagesController@store')->name('message');
