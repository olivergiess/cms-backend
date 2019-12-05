<?php

/*
|--------------------------------------------------------------------------
| Protected API Endpoints
|--------------------------------------------------------------------------
|
| Here you may register all of the API endpoints which are protected by
| authentication.
|
*/

// Auth
Route::post('/auth/logout', 'Auth\Http\Controllers\AuthController@logout');
Route::get('/user/current', 'User\Http\Controllers\CurrentController@show');
Route::put('/user/current', 'User\Http\Controllers\CurrentController@update');

// Blogs
Route::post('/blogs', 'Blog\Http\Controllers\BlogController@store')->middleware('can:create,App\Components\Blog\Http\Resources\BlogResource');
Route::get('/blogs/{id}', 'Blog\Http\Controllers\BlogController@show')->middleware('can:read,App\Components\Blog\Http\Resources\BlogResource,id');
Route::get('/blogs', 'Blog\Http\Controllers\BlogController@all')->middleware('can:all,App\Components\Blog\Http\Resources\BlogResource');
Route::put('/blogs/{id}', 'Blog\Http\Controllers\BlogController@update')->middleware('can:update,App\Components\Blog\Http\Resources\BlogResource,id');
Route::delete('/blogs/{id}', 'Blog\Http\Controllers\BlogController@delete')->middleware('can:delete,App\Components\Blog\Http\Resources\BlogResource,id');

// Posts
Route::post('/posts', 'Post\Http\Controllers\PostController@store')->middleware('can:create,App\Components\Post\Http\Resources\PostResource');
Route::get('/posts/{id}', 'Post\Http\Controllers\PostController@show')->middleware('can:read,App\Components\Post\Http\Resources\PostResource,id');
Route::get('/posts', 'Post\Http\Controllers\PostController@all')->middleware('can:all,App\Components\Post\Http\Resources\PostResource');
Route::put('/posts/{id}', 'Post\Http\Controllers\PostController@update')->middleware('can:update,App\Components\Post\Http\Resources\PostResource,id');
Route::delete('/posts/{id}', 'Post\Http\Controllers\PostController@delete')->middleware('can:delete,App\Components\Post\Http\Resources\PostResource,id');
