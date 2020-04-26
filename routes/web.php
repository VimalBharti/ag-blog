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

// Password - ulrfUttUdwf1HNUT

Route::get('/', 'BlogController@index');
Route::get('/blog/{slug}', 'BlogController@post')->name('post');


Route::any('/search', 'BlogController@search');