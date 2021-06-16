<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('guest/welcome');
});

// Rotte Per autenticazione ( se sottolineato bug)

Auth::routes();
// Auth::routes(['register' => false]); // Per eliminare dalle rotte qualcosa che non vogliamo includere

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function(){
        // Rotta Admin Home
        Route::get('/admin', 'HomeController@index')->name('home');

        // Rotte resource Posts
    });



// Route::get('/admin', 'HomeController@index')->name('home');
