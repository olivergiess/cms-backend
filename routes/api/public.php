<?php

/*
|--------------------------------------------------------------------------
| Public API Endpoints
|--------------------------------------------------------------------------
|
| Here you may register all of the publicly accessible API endpoints.
|
*/

// Auth
Route::post('/auth/login', 'Auth\Http\Controllers\AuthController@login');
Route::post('/auth/refresh', 'Auth\Http\Controllers\AuthController@refresh');

// User
Route::post('/users', 'User\Http\Controllers\UserController@store');
Route::get('/users/{slug}', 'User\Http\Controllers\SlugController@show');

// Posts
Route::get('/users/{slug}/posts/published', 'User\Http\Controllers\SlugController@published');
Route::get('/posts/published', 'Post\Http\Controllers\PublishedController@all');
Route::get('/posts/published/{id}', 'Post\Http\Controllers\PublishedController@show');
