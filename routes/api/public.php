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

// Users
Route::post('/users', 'User\Http\Controllers\UserController@store');

// Blogs
Route::get('/blogs/{url_identifier}', 'Blog\Http\Controllers\URLIdentifierController@show');

// Posts
Route::get('/posts/published', 'Post\Http\Controllers\PublishedController@all');
Route::get('/posts/published/{id}', 'Post\Http\Controllers\PublishedController@show');
