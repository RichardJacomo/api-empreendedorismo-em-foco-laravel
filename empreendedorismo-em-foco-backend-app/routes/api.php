<?php

use Illuminate\Support\Facades\Route;

Route::get('posts', 'App\Http\Controllers\PostController@index');
Route::get('posts/{id}', 'App\Http\Controllers\PostController@show');

Route::post('login', 'App\Http\Controllers\AuthController@login');

Route::group(['middleware' => 'apiJWT'], function () {
    Route::get('users', 'App\Http\Controllers\UserController@index');
    Route::post('posts', 'App\Http\Controllers\PostController@store');
    Route::patch('posts/{id}', 'App\Http\Controllers\PostController@update');
    Route::delete('posts/{id}', 'App\Http\Controllers\PostController@destroy');
});

