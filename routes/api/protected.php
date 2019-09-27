<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Route::post('/logout', 'Auth\Http\Controllers\AuthController@logout');

Route::get('/user/current', 'User\Http\Controllers\UserController@details');

Route::get('/posts', 'Post\Http\Controllers\PostController@all')->middleware('can:all,App\Components\Post\Http\Resources\PostResource');
Route::post('/posts', 'Post\Http\Controllers\PostController@store')->middleware('can:create,App\Components\Post\Http\Resources\PostResource');
Route::get('/posts/{id}', 'Post\Http\Controllers\PostController@show')->middleware('can:read,App\Components\Post\Http\Resources\PostResource,id');
Route::put('/posts/{id}', 'Post\Http\Controllers\PostController@update')->middleware('can:update,App\Components\Post\Http\Resources\PostResource,id');
Route::delete('/posts/{id}', 'Post\Http\Controllers\PostController@delete')->middleware('can:delete,App\Components\Post\Http\Resources\PostResource,id');
