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


/**
 *  TEST
 */
Route::get('/test', function(){
    return response()->json([
        'names' => ['Luca', 'Giovanni', 'Aldo'],
        'lorem' => 'ipsum',
    ]);
});


/**
 *  GET BLOG POSTS
 */

Route::namespace('Api')->group(function(){
    // Get Posts
    Route::get('/posts', 'PostController@index');

    // Get 

    Route::get('/posts/{slug}', 'PostController@show');

});


/**
 *
 */

