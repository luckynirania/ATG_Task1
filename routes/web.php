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

Route::get('/', 'ATGController@home')->name('home');
Route::post('/adduser', 'ATGController@store')->name('adduser');
Route::get('/adduser', 'ATGController@adduser')->name('adduser');

Auth::routes();
