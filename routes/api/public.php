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

Route::post('/login', 'Auth\Http\Controllers\AuthController@login');

Route::get('/users/{slug}', 'User\Http\Controllers\SlugUserController@show');
Route::get('/users/{slug}/posts/published', 'User\Http\Controllers\SlugUserController@published');
