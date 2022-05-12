<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotta namespace Api
Route::namespace('Api')->group( function () {

    // Rotta resource Posts Post controller only index, show
    Route::resource('/posts', 'PostController')->only([
        'index',
        'show'
    ])->parameters([
        'posts' => 'post:slug'
    ]);

    // Rotta categories index
    Route::get('/categories', 'CategoryController@index');

    // Rotta categories category posts archive
    Route::get('/categories/{category}/posts', 'CategoryController@archive');

    // Rotta tags index
    Route::get('/tags', 'TagController@index');
    
});
