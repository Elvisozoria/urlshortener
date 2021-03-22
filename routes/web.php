<?php

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
    return view('home');
});

Route::resource('urls','UrlController');
Route::post('urls/new/','UrlController@request');
Route::get('/{shorturl}', 'UrlController@redirect')-> name('url.redirect');
