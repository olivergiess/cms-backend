<?php

/*
|--------------------------------------------------------------------------
| Public API Endpoints
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Route::get('/test', function () { return 'Testing...'; });

Route::post('/login', 'Auth\Http\Controllers\AuthController@login');

Route::get('/posts/published/{slug}', '\App\Components\Post\Http\Controllers\PublishedPostController@all');
Route::get('/posts/published/{slug}/{id}', '\App\Components\Post\Http\Controllers\PublishedPostController@show');
