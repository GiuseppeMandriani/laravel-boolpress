<?php

use Illuminate\Support\Facades\Route;

Use Illuminate\Support\Facades\Auth;

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



// Rotte Per autenticazione ( se sottolineato bug)

Auth::routes();
// Auth::routes(['register' => false]); // Per eliminare dalle rotte qualcosa che non vogliamo includere

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function(){
        // Rotta Admin Home
        Route::get('/', 'HomeController@index')->name('home');

        // Rotte resource Posts
        Route::resource('/posts', 'PostController');
    });

// Front-Office
Route::get('{any?}', function () {
    return view('guest/home');
})->where("any", ".*");



// Route::get('/admin', 'HomeController@index')->name('home');
